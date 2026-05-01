<?php
require_once __DIR__ . '/../Models/doctorModel.php';

function getDoctorsController() {
    return getAllDoctors();
}

function getDoctorByIdController($id) {
    return getDoctorById($id); 
}

function getDoctorByEmailController($email) {
    return getDoctorByEmail($email); 
}

function getDoctorCountController() {
    return getDoctorCount();
}


?>
