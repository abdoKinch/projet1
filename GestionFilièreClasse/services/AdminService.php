<?php

include_once 'beans/Admin.php';
include_once 'connexion/Connexion.php';
include_once 'dao/IDao.php';

class AdminService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
        $query = "INSERT INTO `employe`(`cin`, `nom`, `prenom`, `email`, `password`) "
                . "VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getCin(), $o->getNom(), $o->getPrenom(), $o->getEmail(),
                    $o->getPassword())) or die('Error');
    }

    public function delete($cin) {
        $query = "DELETE FROM Employe WHERE cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin)) or die("erreur delete");
    }

    public function findAll() {
        $query = "select e.* , f.nom as 'nomf', d.libelle as 'nomd' from Employe e inner join fonction f on e.fonction = f.id inner join departement d on e.departement=d.id";
        $req = $this->connexion->getConnexion()->query($query);
        $f = $req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findById($cin) {
        $query = "select * from Employe where cin =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($cin));
        $res = $req->fetch(PDO::FETCH_OBJ);
        $admin = new Admin($res->cin, $res->nom, $res->prenom, $res->email, $res->password);
        return $admin;
    }

    public function findByEmail($email) {
        $query = "select * from Employe where email =?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($email));
        $s = $req->fetchAll(PDO::FETCH_OBJ);
        if (count($s) != 0) {
            foreach ($s as $res) {
                $cin = $res->cin;
        }
            return $cin;
        } else
            return -1;
    }

    public function update($o) {
        $query = "UPDATE Employe SET  nom=?, prenom =?, email =?, telephone =?, adresse =?, password =?, role =?, photo =?, fonction =?, departement =?  where cin = ?";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute(array($o->getNom(), $o->getPrenom(), $o->getEmail(),
                    $o->getPassword(), $o->getCin())) or die('Error');
    }
    
    public function countByClasse(){
        $query="SELECT COUNT(*) as nbr_classe,filiere.code AS code_filiere FROM classes INNER JOIN filiere ON classes.IdFiliere=filiere.id GROUP BY code_filiere";
        $req=$this->connexion->getConnexion()->query($query);
        $f=$req->fetchAll(PDO::FETCH_OBJ);
        return $f;
    }

    public function findByIdFiliere($idfilier){

    }

}
