<?php

	include "../system/configuration.php";
	
	$html='';
	$html.="<header>";
	$html.="<h1>Installation</h1>";
	$html.="<h2>Erstellen der Datenbanktabellen</h2>";
	$html.="</header>";
	$html.="<p>Es werden die Datenbanktabellen erstellt...</p>";
	$html.='<p> Dies kann eine Zeit dauern...</p>';
	echo $html;


/**
 * Fehlerbehandlung entfernen, sobald die Seite online geht
 */
	
	try{
		
		$pdo=new PDO(DB_SERVER,DB_USER,DB_PW);
		
//################# Tabelle für Meta-Daten erstellen ###############################

		$sql ="CREATE TABLE IF NOT EXISTS ".DB_PREFIX."meta (
		meta_ID INT( 11 ) AUTO_INCREMENT,
		meta_Name VARCHAR( 50 ) NOT NULL,
		meta_Description TEXT NOT NULL,
		PRIMARY KEY(meta_id));" ;
		
		$pdo->exec($sql);
		
		
//################# Tabelle für Login-Daten erstellen ###############################

		$sql ="CREATE TABLE IF NOT EXISTS ".DB_PREFIX."login (
		login_ID INT( 11 ) AUTO_INCREMENT,
		login_Email VARCHAR( 50 ) NOT NULL,
		login_Passwort VARCHAR(50) NOT NULL,
		login_Gesperrt TINYINT(1) DEFAULT 0,
		login_Fehlversuche TINYINT(1) DEFAULT 0,
		PRIMARY KEY(login_ID));" ;
		
		$pdo->exec($sql);
		

//################# Datenbankverbindung schliessen #################################

		$pdo=NULL;
		
	}catch (PDOException $e){
		echo $e->getMessage();
	}
?>