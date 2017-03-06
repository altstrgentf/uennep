<?php 

$html='';
$html.="<header>";
$html.="<h1>Installation</h1>";
$html.="<h2>Erstellen der Grundkonfiguration</h2>";
$html.="</header>";
$html.="<p>Vor der Konfiguration beim Provider eine leere Datenbank erstellen und dann hier die
		entsprechenden Angaben eintragen!</p>";
$html.='<form id="config" method="get">';
$html.='<label for="Seitentitel">Seitentitel:</label>
		<input type="text" name="Seitentitel" value="'.$_GET['Seitentitel'].'" required/>
		<span>Hier den Titel der Webseite angeben!</span>
		<br>';
$html.='<label for="Datenbank">Datenbankname:</label>
		<input type="text" name="Datenbank" value="'.$_GET['Datenbank'].'" required/>
		<span>Hier die Bezeichnung der Datenbank angeben!</span>
		<br>';
$html.='<label for="Datenbankhost">Datenbankhost:</label>
		<input type="text" name="dbHost" value="'.$_GET['dbHost'].'" required/>
		<span>Hier den Host der Datenbank angeben! Bei lokalen Systemen in der Regel "localhost", ansonsten nach Providervorgabe.</span>
		<br>';
$html.='<label for="Benutzername">Benutzername:</label>
		<input type="text" name="Benutzername" value="'.$_GET['Benutzername'].'" required />
		<br>';
$html.='<label for="Passwort">Passwort:</label>
		<input type="password" name="Passwort" value="'.$_GET['Passwort'].'" required '.$pw_false.' />
		<br>';
$html.='<label for="Passwort_wieder">Passwort wiederholen:</label>
		<input type="password" name="Passwort_wieder" value="'.$_GET['Passwort_wieder'].'" required '.$pw_false.' />
		<br>';
$html.='<input type="hidden" name="gesendet" value="ja"/>';
$html.='<input type="submit" value="Speichern" class="btn-senden"/>';
$html.='</form>';
echo $html;
?>