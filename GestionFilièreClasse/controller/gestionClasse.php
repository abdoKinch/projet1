<?php

chdir('..');
include_once 'services/ClasseService.php';
extract($_POST);

$fs = new ClasseService();

if ($op != '') {
    if ($op == 'add') {
        $fs->create(new Classe(0, $code, $filiere));
        echo json_encode($fs->findAll());
    } elseif ($op == 'update') {
        $fs->update(new Classe($id, $code, $filiere));
        echo json_encode($fs->findAll());
    } elseif ($op == 'delete') {
        $fs->delete($id);
        echo json_encode($fs->findAll());
    }
}else if($op == '' && isset($idfilier)){
    echo json_encode($fs->findByIdFiliere($idfilier));
}elseif ($op == 'count') {
        header('Content-type: application/json');
        echo json_encode($ms->findByfil());
}else{
  echo json_encode($fs->findAll());
}

header('Content-type: application/json');
?>

