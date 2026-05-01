<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'doctor') {
    echo "Unauthorized! <a href='../../Views/patientlogin.php'>Login</a>";
    exit();
}
setcookie("doctor_name", $_SESSION['name'], time() + 86400, "/");

require_once "../../Controllers/patientController.php";
require_once "../../Controllers/reportController.php";


$totalPatients = getPatientCountController(); 
$totalReports = getReportCountController(); 


?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Dashboard - MedLink</title>
  <link rel="stylesheet" href="../../Assets/doctor-dashboard-style.css">
</head>
<body>

<aside class="sidebar">
  <h1>MEDLINK PRO</h1>
  <nav class="menu">
    <a href="#" class="active">Dashboard</a>
    <a href="myprofile.php">My Profile</a>
    <a href="listOfPatients.php">Patients</a>
    <a href="../Medlink/public/index.php">Appointments</a>
    <a href="reports.php">Reports</a>
    <a href="../../Controllers/logout.php">Logout</a>
  </nav>
</aside>

<main class="main-content">

<header>
  <h1>Welcome Dr. 
    <?php 
        if(isset($_COOKIE['doctor_name'])){
            echo $_COOKIE['doctor_name']; 
        } else {
            echo $_SESSION['name'];
        }
    ?>
   </h1>
  <p>Here is today’s overview</p>
</header>

<div class="dashboard-cards">
  <div class="card" onclick="location.href='listOfPatients.php'">
    <h3>Total Patients</h3>
    <p><?php echo $totalPatients; ?></p>
  </div>

  <div class="card" onclick="location.href='../Medlink/public/index.php'">
    <h3>Today's Appointments</h3>
    <p>4</p>
  </div>

  <div class="card" onclick="location.href='reports.php'">
    <h3>Reports</h3>
    <p><?php echo $totalReports; ?></p>
  </div>
</div>

<section class="quick-actions">
  <div class="action-btn" onclick="location.href='listOfPatients.php'">➕ Add Patient</div>
  <div class="action-btn" onclick="location.href='../Medlink/public/index.php'">📅 New Appointment</div>
  <div class="action-btn" onclick="location.href='reports.php'">🧾 Upload Report</div>
</section>

<section class="panel">
  <h3>Recent Patients</h3>
  
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Gender</th>

      </tr>
    </thead>

    <tbody id="patientList">
    </tbody>
  </table>
</section>

</main>

<script>
function loadRecentPatients() {
    let xhttp = new XMLHttpRequest();
    xhttp.open("GET", "../../Controllers/patients_api.php", true);
    xhttp.send();

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            let patients = JSON.parse(this.responseText);
            let table = document.getElementById("patientList");
            table.innerHTML = "";

            patients.slice(0, 10).forEach(function(p) {
                let row = `
                    <tr>
                        <td>${p.name}</td>
                        <td>${p.email}</td>
                        <td>${p.phone}</td>
                        <td>${p.gender}</td>

                        
                    </tr>
                `;
                table.innerHTML += row;
            });
        }
    };
}

document.addEventListener("DOMContentLoaded", loadRecentPatients);
</script>

</body>
</html>
