<?php
session_start();

require_once "../../Controllers/patientController.php";

if (isset($_GET['id'])) {
    $patientId = $_GET['id'];
    $patient = getPatientByIdController($patientId);

    if (!$patient) {
        echo "Patient not found!";
        exit();
    }

    $name  = $patient['name'];
    $email = $patient['email'];

} else {
    if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: ../../Views/patientlogin.php");
    exit();
}

$name  = $_SESSION['name'];
$email = $_SESSION['email'];

  $patient = getPatientByEmailController($email);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile - MedLink</title>
  <link rel="stylesheet" href="../../Assets/patientProfile.css">
</head>
<body>

<aside class="sidebar">
  <h1>MEDLINK</h1>
  
</aside>

  <a href="../doctor/dashboard.php" class="back-btn">&lt; Back</a>


<main class="main-content">

  <header>
    <h1>👤  Profile</h1>
  </header>

  <section class="profile-section">

    <div class="profile-card">

      <div class="profile-header">
        <div class="avatar">
          <?php echo strtoupper($name[0]); ?>
        </div>
        <h2><?php echo $name ?></h2>
        <p><?php echo $email ?></p>
      </div>

      <div class="profile-body">
        <div class="info-row">
          <span class="label">Full Name</span>
          <span class="value"><?php echo $name ?></span>
        </div>

        <div class="info-row">
          <span class="label">Email</span>
          <span class="value"> <?php echo $email ?></span>
        </div>
      </div>

      <div class="profile-footer">
        <a href="../../Views/patientlogin.php?logout=1" class="btn secondary">Logout</a>
      </div>

    </div>

  </section>

</main>

</body>
</html>
