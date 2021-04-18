<?php

chdir('..');
include_once 'services/AdminService.php';
extract($_POST);

$es = new AdminService();
$r = true;

if ($op != '') {
    if ($op == 'add') {
        $es->create(new Admin($cin, $nom, $prenom, $email, md5($password)));
    } elseif ($op == 'update') {
        $_password = $es->findById($cin)->getPassword();
        if($password==""){
            $password = $_password;
        }else{
            $password = md5($password);
        }
        $es->update(new Admin($cin, $nom, $prenom, $email, $password));
    } elseif ($op == 'delete') {
        $es->delete($es->delete($cin));
    } elseif ($op == 'find') {
        header('Content-type: application/json');
        echo json_encode($es->findById($cin));
        $r = false;
    }  elseif ($op == 'countClasse') {
        header('Content-type: application/json');
        echo json_encode($es->countByClasse());
        $r = false;
    }
}
if ($r == true){
    header('Content-type: application/json');
    echo json_encode($es->findAll());
}

