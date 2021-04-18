<?php

chdir('..');
include_once 'beans/Admin.php';
include_once 'services/AdminService.php';
extract($_POST);

$es = new AdminService();
$cin = $es->findByEmail($email);
if ($cin != -1) {
    $admin = $es->findById($cin);
    if ($admin->getPassword() == md5($password)) {
        header('Content-type: application/json');
        echo json_encode(array("cin"=>$employe->getCin(),"nom"=>$employe->getNom(),"prenom"=>$employe->getPrenom()
                ,"password"=>$employe->getPassword(),"email"=>$employe->getEmail()));
    } else
        echo 0;
}else {
    echo 0;
}
