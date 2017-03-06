<!DOCTYPE HTML>
<html lang="de">
	<head>
		<?php 
			if (!isset($_GET['Seite'])) $_GET['Seite']='';
			if (!isset($_GET['gesendet'])) $_GET['gesendet']='';
			if (!isset($_GET['Datenbank'])) $_GET['Datenbank']='';
			if (!isset($_GET['Seitentitel'])) $_GET['Seitentitel']='';
			if (!isset($_GET['Benutzername'])) $_GET['Benutzername']='';
			if (!isset($_GET['Passwort'])) $_GET['Passwort']='';
			if (!isset($_GET['Passwort_wieder'])) $_GET['Passwort_wieder']='';
			if (!isset($_GET['dbHost'])) $_GET['dbHost']='';
			if ($_GET['Seite']==''){
				$seiteContent='configuration.php';
			}else{
				$seiteContent=$_GET['Seite'];
			}
			$pw_false='class="msg-ok"';
		?>
		<meta charset="utf-8">
		<link rel="stylesheet" href="installation.css">
		<title>Installation</title>
	</head>
	<body>
		<?php 
		
			if ($_GET['gesendet']==''){
				include $seiteContent;
			}
			if ($_GET['Passwort']!== $_GET['Passwort_wieder']) $pw_false='class="msg-false"';
			if ($_GET['gesendet']=='ja'){
				include $seiteContent;
				$inhalt="<?php \n";
				$inhalt.='define (BASE_DIR,"'.$_SERVER['DOCUMENT_ROOT'].'");'."\n";
				$inhalt.='define (SITENAME,"'.$_GET['Seitentitel'].'");'."\n";
				$inhalt.='define (DB_SERVER,"mysql:host='.$_GET['dbHost'].';dbname='.$_GET['Datenbank'].'");'."\n";
				$inhalt.='define (DB_USER,"'.$_GET['Benutzername'].'");'."\n";
				$inhalt.='define (DB_PW,"'.$_GET['Passwort'].'");'."\n";
				$inhalt.='?>';
				$datei=$_SERVER['DOCUMENT_ROOT']."/system/configuration.php";
				$fp=fopen($datei,'w');
				$fpw=fwrite($fp, $inhalt);
				fclose($fp);
				if($fpw){
					echo '<p class="msg-ok">Datei "configuration.php" erfolgreich erstellt.</p>';
					echo '<p><form method="get" id="btn-weiter"><input type="submit" value="tables.php" name="Seite" /></form>';
				}else {
					echo '<p class="msg-false">Datei "configuration.php" konnte nicht erstellt werden.</p>';
				}
			}
		?>
	</body>
</html>