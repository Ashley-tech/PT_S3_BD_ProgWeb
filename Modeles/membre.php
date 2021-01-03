<?php
    class Membre{
        private $co;
        private $id;
	private $nom;
	private $prenom;
        private $pseudo;
        private $mdepasse;
        private $adresse;
	private $cp;
	private $ville;
	private $quart;

        public function __construct(){
            $ctp = func_num_args();
            $args = func_get_args();
        }

        switch($ctp)
        {
            case 3:
                $co = $args[0];
                $pseudo = $args[1];
                $mdepasse = $args[2];

                //cas où le membre existe déjà
                $result = mysqli_query($co, "SELECT numClient, nomClient, prenomClient
                                             FROM client
                                             WHERE loginClient='$pseudo'
                                             AND mdpClient='$mdepasse'")
                          or die ("Erreur requête");

                while ($row = mysqli_fetch_assoc($result)){
                    $this->co = $co;
                    $this->pseudo = $pseudo;
                    $this->mdepasse = $mdpasse;
                    $this->id = $row["id"];
                    $this->nom = $row["nomClient"];
                    $this->prenom = $row["prenomClient"];
                    $this->adresse = $row["adresse"];
                    $this->cp = $row["codepostal"];
                    $this->ville = $row["ville"];
                    $this->quart = $row["numQuartier"];
                }
                break;
            case 8:
                $co = $args[0];
                $nom = $args[1];
                $prenom = $args[2];
                $pseudo = $args[3];
                $mdepasse = $args[4];
                $adresse = $args[5];
                $cp = $args[6];
                $ville = $args[7];

                mysqli_query($co, "INSERT INTO Client VALUES ('','$nom','$prenom','$pseudo','$mdepasse','$adresse','$cp','$ville','')")
                or die("Erreur insertion");

                $this->co = $co;
                $this->id = mysqli_insert_id($co);
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->pseudo = $pseudo;
                $this->mdepasse = $mdepasse;
                $this->adresse = $adresse;
                $this->cp = $cp;
                $this->ville = $ville;
                break;
        }

        public function connexion(){
            session_start();
            $_SESSION['pseudo'] = $this->pseudo;
        }

        public function deconnexion(){
            session_destroy();
            mysqli_close($this->co);
        }

        public function modif_mdepasse($mdepasse){
            $id = $this->id;
            $this->mdepasse = $mdepasse;
            mysqli_query($co, "UPDATE membres SET mdpClient='$mdepasse' WHERE numClient='$id'") or die ("Erreur de modification du mot de passe");
            
        }
    }
?>
