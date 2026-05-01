<?php
require_once __DIR__ . '/../Models/patientModel.php'; 
require_once __DIR__ . '/../Models/userModel.php'; 


function getPatientsController() {
    return getAllPatients();
}


function getPatientByIdController($id) {
    return getPatientById($id); 
}

function getPatientByEmailController($email) {
    return getPatientByEmail($email); 
}

function getPatientCountController() {
    return getPatientCount();
}
?>
