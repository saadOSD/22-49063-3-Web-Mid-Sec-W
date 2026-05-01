<?php
class BookingController extends Controller {

    public function confirm() {
        $this->view("booking/confirm");
    }

    public function store() {

    if (!Security::verifyToken($_POST['token'])) {
        die("Invalid request");
    }

    // Simple PHP validation
    if (
        empty($_POST['patient']) ||
        empty($_POST['blood']) ||
        empty($_POST['gender']) ||
        empty($_POST['phone']) ||
        empty($_POST['reason'])
    ) {
        die("All fields are required");
    }

    $_SESSION['booking'] = [
        "doctor" => $_SESSION['doctor'],
        "patient" => Security::clean($_POST['patient']),
        "blood" => Security::clean($_POST['blood']),
        "gender" => Security::clean($_POST['gender']),
        "phone" => Security::clean($_POST['phone']),
        "reason" => Security::clean($_POST['reason'])
    ];

    header("Location: index.php?c=booking&a=summary");
}

    public function summary() {
        $this->view("booking/summary");
    }
}
