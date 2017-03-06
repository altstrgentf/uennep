<!DOCTYPE HTML>
<html lang="de">
<!-- ###############################################################################
     ############## Autor: Lars Münchhagen      ####################################
     ############## Email: info@muenchhagen.net ####################################
     ############## (c) 2017 Lars Münchhagen    ####################################
     ###############################################################################
-->
	<head>
		<?php 
		
/**
 * Variablen initialisieren ########################################################
 */
		if (!isset($_GET['Seite'])) $_GET['Seite']='';
		if (!isset($_GET['gesendet'])) $_GET['gesendet']='';
/**
 * Ermitteln, welche Seite geladen werden soll #####################################
 */		
		if ($_GET['Seite']==''){
			$seiteContent='configuration.php';
		}else{
			$seiteContent=$_GET['Seite'];
		}
/**
 * HTML-Header #####################################################################
 */			
		?>
		<meta charset="utf-8">
		<link rel="stylesheet" href="installation.css">
		<title>Installation</title>
	</head>

<!-- Body-Bereich ############################################################## -->

	<body>
		<?php 

/**
 * Einfügen des externen Contents ##################################################
 */		
			if ($_GET['gesendet']=='') include $seiteContent;
			if ($_GET['gesendet']=='ja') include $seiteContent;
				
		?>
	</body>
</html>