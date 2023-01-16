<?php
// La classe responsable de se connecter a/deconnecter de la BDD
class ConnexionBdd{
    // Les attributs
    private $bdd_host = "localhost";
    private $bdd_user = "root";
    private $bdd_pswd = "";
    private $bdd_name = "tdw";

    // La methode qui permet de se connecter a la bdd
    public function connexion(){
        // La connexion peut lancer une exception
        try{
            $bdd = new PDO("mysql:host={$this->bdd_host};dbname={$this->bdd_name}",$this->bdd_user,$this->bdd_pswd);
            $bdd->query('SET NAMES utf8');
            // configurer le mode afin de lancer des exceptions
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        }
        catch(PDOException $ex){
            printf("Erreur de connexion à la base de données !");
            exit();
        }
        return $bdd;
    }
    //methode permettant la deconnexion de la BDD $bdd
    public function deconnexion($bdd){
        $bdd = null;
    }
    //Methode permettant la préparation et l'exécution d'une requete r via la BDD $bdd
    public function requete($bdd, $r){
        $stmt = $bdd->prepare($r);
        return $stmt->execute();
    }
}

?>