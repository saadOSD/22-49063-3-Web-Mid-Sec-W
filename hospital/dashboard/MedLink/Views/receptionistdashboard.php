<?php
session_start();

// 1. Authorization Check
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'receptionist') {
    // Redirect to login if not a receptionist
    header("Location: ../auth/login.php"); 
    exit();
}

// 2. Include Controllers (You will need to create these or use existing ones)
// require_once '../../Controllers/receptionistController.php'; 

// 3. Mock Data (Replace these with actual database calls from your Controller later)
// Example: $stats = getDashboardStats();
$receptionist_name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Receptionist';
$total_patients = 150; // Replace with count($patients) logic
$todays_appointments_count = 12; 
$pending_inquiries = 5;

// Mock Appointments Data for the table loop
$appointments_list = [
    ['time' => '09:00', 'date' => '2026-01-07', 'patient_name' => 'John Doe', 'doctor_name' => 'Dr. Smith', 'status' => 'Pending'],
    ['time' => '09:30', 'date' => '2026-01-07', 'patient_name' => 'Jane Smith', 'doctor_name' => 'Dr. Ayesha', 'status' => 'Completed'],
    ['time' => '10:00', 'date' => '2026-01-07', 'patient_name' => 'Ali Khan', 'doctor_name' => 'Dr. Smith', 'status' => 'Pending'],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receptionist Dashboard - MedLink</title>
  <link rel="stylesheet" href="../Assets/doctor-dashboard-style.css">
</head>
<body>

  <aside class="sidebar">
    <h1>MEDLINK PRO</h1>
    <nav class="menu">
      <a href="#" class="active">Dashboard</a>
      <a href="myprofile.php">My Profile</a>
      <a href="managePatients.php">Manage Patients</a> <a href="allAppointments.php">All Appointments</a> <a href="doctorSchedules.php">Doctor Schedules</a> <a href="billing.php">Billing & Invoices</a> <a href="../../Views/auth/login.php?logout=1">Logout</a>
    </nav>
  </aside>

  <main class="main-content">

    <header>
      <h1>Welcome, <?php echo htmlspecialchars($receptionist_name); ?> </h1>
      <p>Front desk overview for today</p>
    </header>

    <div class="dashboard-cards">
      <div class="card" onclick="location.href='managePatients.php'">
        <h3>Total Patients</h3>
        <p><?php echo $total_patients; ?></p>
      </div>

      <div class="card" onclick="location.href='allAppointments.php'">
        <h3>Today's Appointments</h3>
        <p><?php echo $todays_appointments_count; ?></p>
      </div>

      <div class="card" onclick="location.href='inquiries.php'">
        <h3>Pending Inquiries</h3>
        <p><?php echo $pending_inquiries; ?></p>
      </div>
    </div>

    <section class="quick-actions">
      <div class="action-btn" onclick="location.href='registerPatient.php'">➕ Register Patient</div>
      <div class="action-btn" onclick="location.href='bookAppointment.php'">📅 Book Appointment</div>
      <div class="action-btn" onclick="location.href='billing.php'">💵 Create Invoice</div>
    </section>

    <section class="panel">
      <h3>Today's Schedule</h3>
      <table>
        <thead>
          <tr>
            <th>Time</th>
            <th>Patient Name</th>
            <th>Assigned Doctor</th> <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($appointments_list)): ?>
            <?php foreach ($appointments_list as $row): ?>
              <tr>
                <td><?= date("h:i A", strtotime($row['time'])) ?></td>
                <td><?= htmlspecialchars($row['patient_name']) ?></td>
                <td><?= htmlspecialchars($row['doctor_name']) ?></td>
                
                <td class="status <?= strtolower($row['status']) ?>">
                  <?= $row['status'] ?>
                </td>
                
                <td>
                    <button class="btn-sm">Edit</button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="5" style="text-align:center;">No appointments scheduled for today.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </section>

  </main>

</body>
</html>