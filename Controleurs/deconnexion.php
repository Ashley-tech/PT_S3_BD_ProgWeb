<?php
	require_once("../PT/modeles/bd.php");
	require_once("../PT/modeles/membre.php");
	
	session_start();
	
	if (isset($_POST["deconnec"]) && isset($_SESSION["login"])){
		$coBd = new Bd("projet_tutore");
		$co = $coBd->connexion();
		$nom = $_SESSION["login"];
		
		$result = mysqli_query($co, "SELECT mdpClient FROM Client WHERE login='$nom'");
									 
		while ($row = mysqli_fetch_assoc($result)){
			$pwd = $row["mdpClient"];
			$m = new Membre($co,$id,$nom,$prenom,$pseudo,$mdepasse,$adresse,$cp,$ville,$quart);
			$m->deconnexion();
		}
		
		header('Location:../PT/Vues/formulare_inscription.php');
	}
?>