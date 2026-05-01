<?php
require_once __DIR__ . "/../models/Doctor.php";

class DoctorController extends Controller {

   public function list() {

    $doctors = Doctor::getAll();

    // Check if search submitted
    if (isset($_GET['search']) && $_GET['search'] != "") {

        $keyword = strtolower(Security::clean($_GET['search']));
        $filtered = [];

        foreach ($doctors as $doc) {
            if (
                strpos(strtolower($doc['name']), $keyword) !== false ||
                strpos(strtolower($doc['specialty']), $keyword) !== false
            ) {
                $filtered[] = $doc;
            }
        }

        $doctors = $filtered;
    }

    $this->view("doctor/search", compact("doctors"));
}


    public function profile() {
        $doctor = Doctor::findById((int)$_GET['id']);
        if (!$doctor) die("Doctor not found");
        $this->view("doctor/profile", compact("doctor"));
    }

    public function select() {
        $_SESSION['doctor'] = [
            "name"=>$_POST['name'],
            "specialty"=>$_POST['specialty'],
            "fee"=>$_POST['fee']
        ];
        header("Location: index.php?c=booking&a=confirm");
    }
}
