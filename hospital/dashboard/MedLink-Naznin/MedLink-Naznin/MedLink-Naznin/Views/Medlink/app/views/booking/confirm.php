<h3>Appointment Booking</h3>

<form method="post"
      action="index.php?c=booking&a=store"
      onsubmit="return validateBooking()">

    <!-- CSRF Token -->
    <input type="hidden" name="token" value="<?= Security::csrfToken() ?>">

    <!-- Patient Name -->
    <label>Patient Name</label><br>
    <input type="text" name="patient" placeholder="Enter patient name"><br><br>

    <!-- Blood Group -->
    <label>Blood Group</label><br>
    <select name="blood">
        <option value="">Select Blood Group</option>
        <option>A+</option>
        <option>A-</option>
        <option>B+</option>
        <option>B-</option>
        <option>O+</option>
        <option>O-</option>
        <option>AB+</option>
        <option>AB-</option>
    </select><br><br>

    <!-- Gender -->
    <label>Gender</label><br>
    <select name="gender">
        <option value="">Select Gender</option>
        <option>Male</option>
        <option>Female</option>
    </select><br><br>

    <!-- Phone Number -->
    <label>Phone Number</label><br>
    <input type="text" name="phone" placeholder="Enter phone number"><br><br>

    <!-- Reason -->
    <label>Reason for Appointment</label><br>
    <textarea name="reason" placeholder="Describe your problem"></textarea><br><br>

    <!-- Submit Button -->
    <button class="btn">Confirm Booking</button>

</form>
