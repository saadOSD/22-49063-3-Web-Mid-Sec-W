
<?php
session_start();
require_once "../../Controllers/doctorController.php";

if (isset($_GET['id'])) {
    $doctorId = $_GET['id'];
    $doctor = getDoctorByIdController($doctorId);

    if (!$doctor) {
        echo "Doctor not found!";
        exit();
    }

    $name  = $doctor['name'];
    $email = $doctor['email'];

} else {
    if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
        header("Location: ../../Views/patientlogin.php");
        exit();
    }

    $name  = $_SESSION['name'];
    $email = $_SESSION['email'];

    $doctor = getDoctorByEmailController($email);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile - MedLink</title>
  <link rel="stylesheet" href="../../Assets/doctorProfile.css">
</head>
<body>

<aside class="sidebar">
  <h1>MEDLINK PRO</h1>
  
</aside>

  <a href="../doctor/dashboard.php" class="back-btn">&lt; Back</a>


<main class="main-content">

  <header class="page-header">
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
          <span class="label">Designation</span>
          <p><?php echo $doctor['specialty'] ?></p>
        </div>

        <div class="info-row">
          <span class="label">Email</span>
          <span class="value"><?php echo $email ?></span>
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
