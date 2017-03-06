<?php 


if (!isset($_GET['gesendet'])) $_GET['gesendet']='';
if (!isset($_GET['Datenbank'])) $_GET['Datenbank']='';
if (!isset($_GET['Datenbankprefix'])) $_GET['Datenbankprefix']='';
if (!isset($_GET['Seitentitel'])) $_GET['Seitentitel']='';
if (!isset($_GET['Benutzername'])) $_GET['Benutzername']='';
if (!isset($_GET['Passwort'])) $_GET['Passwort']='';
if (!isset($_GET['Passwort_wieder'])) $_GET['Passwort_wieder']='';
if (!isset($_GET['dbHost'])) $_GET['dbHost']='';

$pw_false='class="msg-false"';

$html='';
$html.="<header>";
$html.="<h1>Installation</h1>";
$html.="<h2>Erstellen der Grundkonfiguration</h2>";
$html.="</header>";
$html.="<p>Vor der Konfiguration beim Provider eine leere Datenbank erstellen und dann hier die
		entsprechenden Angaben eintragen!</p>";
$html.='<form id="config" method="get">';
$html.='<label for="Seitentitel">Seitentitel:</label>
		<div><input type="text" name="Seitentitel" value="'.$_GET['Seitentitel'].'" required/></div>
		<span>Hier den Titel der Webseite angeben!</span>
		<br>';
$html.='<label for="Datenbank">Datenbankname:</label>
		<div><input type="text" name="Datenbank" value="'.$_GET['Datenbank'].'" required/></div>
		<span>Hier die Bezeichnung der Datenbank angeben!</span>
		<br>';
$html.='<label for="Datenbankprefix">Datenbankprefix:</label>
		<div><input type="text" name="Datenbankprefix" value="'.$_GET['Datenbankprefix'].'" required/></div>
		<span>Hier einen Prefix für die Tabellen angeben!</span>
		<br>';
$html.='<label for="Datenbankhost">Datenbankhost:</label>
		<div><input type="text" name="dbHost" value="'.$_GET['dbHost'].'" required/></div>
		<span>Hier den Host der Datenbank angeben! Bei lokalen Systemen in der Regel "localhost", ansonsten nach Providervorgabe.</span>
		<br>';
$html.='<label for="Benutzername">Benutzername:</label>
		<div><input type="text" name="Benutzername" value="'.$_GET['Benutzername'].'" required /></div>
		<br>';
$html.='<label for="Passwort">Passwort:</label>
		<div '.$pw_false.' ><input type="password" name="Passwort" value="'.$_GET['Passwort'].'" required /></div>
		<br>';
$html.='<label for="Passwort_wieder">Passwort wiederholen:</label>
		<div '.$pw_false.' ><input type="password" name="Passwort_wieder" value="'.$_GET['Passwort_wieder'].'" required /></div>
		<br>';
$html.='<input type="hidden" name="gesendet" value="ja"/>';
$html.='<input type="submit" value="Speichern" class="btn-senden"/>';
$html.='</form>';
echo $html;


if ($_GET['Passwort']== $_GET['Passwort_wieder']) $pw_false='class="msg-ok"';
if ($_GET['gesendet']=='ja'){
	$inhalt="<?php \n";
	$inhalt.='const M_DIR="'.$_SERVER['DOCUMENT_ROOT'].'";'."\n";
	$inhalt.='const M_SITENAME="'.$_GET['Seitentitel'].'";'."\n";
	$inhalt.='const DB_SERVER="mysql:host='.$_GET['dbHost'].';dbname='.$_GET['Datenbank'].'";'."\n";
	$inhalt.='const DB_USER="'.$_GET['Benutzername'].'";'."\n";
	$inhalt.='const DB_PW="'.$_GET['Passwort'].'";'."\n";
	$inhalt.='const DB_PREFIX="'.$_GET['Datenbankprefix'].'";'."\n";
	$inhalt.='?>';
	$datei=$_SERVER['DOCUMENT_ROOT']."/system/configuration.php";
	$fp=fopen($datei,'w');
	$fpw=fwrite($fp, $inhalt);
	fclose($fp);
	if($fpw){
		echo '<p class="msg-ok">Datei "configuration.php" erfolgreich erstellt.</p>';
		echo '<p><form method="get"><button type="submit" value="tables.php" name="Seite" class="btn-senden">Weiter</button></form>';
	}else {
		echo '<p class="msg-false">Datei "configuration.php" konnte nicht erstellt werden.</p>';
	}
}

?>