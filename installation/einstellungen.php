<?php

	include "../system/configuration.php";
	
	if (!isset($_GET['Seitentitel'])) $_GET['Seitentitel']='';
	if (!isset($_GET['BetreiberName'])) $_GET['BetreiberName']='';
	if (!isset($_GET['BetreiberEmail'])) $_GET['BetreiberEmail']='';
	if (!isset($_GET['BetreiberHausnummer'])) $_GET['BetreiberHausnummer']='';
	if (!isset($_GET['BetreiberLand'])) $_GET['BetreiberLand']='';
	if (!isset($_GET['BetreiberLandVorwahl'])) $_GET['BetreiberLandVorwahl']='';
	if (!isset($_GET['BetreiberOrt'])) $_GET['BetreiberOrt']='';
	if (!isset($_GET['BetreiberOrtVorwahl'])) $_GET['BetreiberOrtVorwahl']='';
	if (!isset($_GET['BetreiberPlz'])) $_GET['BetreiberPlz']='';
	if (!isset($_GET['BetreiberStrasse'])) $_GET['BetreiberStrasse']='';
	if (!isset($_GET['BetreiberTelefon'])) $_GET['BetreiberTelefon']='';
	
	if ($_GET['gesendet']=='ja2'){
		try{
			echo DB_SERVER.",".DB_USER.",".DB_PW;
			$pdo=new PDO(DB_SERVER,DB_USER,DB_PW);
			
			$sql="INSERT INTO".DB_PREFIX."system (system_Bezeichnung, system_Wert)
				VALUES ('Seitentitel','".$_GET['Seitentitel']."'),
						('BetreiberName','".$_GET['BetreiberName']."'),
						('BetreiberEmail','".$_GET['BetreiberEmail']."'),
						('BetreiberStrasse','".$_GET['BetreiberStrasse']."'),
						('BetreiberHausnummer','".$_GET['BetreiberHausnummer']."'),
						('BetreiberLand','".$_GET['BetreiberLand']."'),
						('BetreiberPlz','".$_GET['BetreiberPlz']."'),
						('BetreiberOrt','".$_GET['BetreiberOrt']."'),
						('BetreiberLandVorwahl','".$_GET['BetreiberLandVorwahl']."'),
						('BetreiberOrtVorwahl','".$_GET['BetreiberOrtVorwahl']."'),
						('BetreiberTelefon','".$_GET['BetreiberTelefon']."');";
			$pdo->exec($sql);
			$pdo=NULL;
			
		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
?>
<header>
	<h1>Installation</h1>
	<h2>Erstellen der Systemtabelle</h2>
</header>
<main>
	<form id="Seiteneinstellungen" method="get">
		<section class="left">
			<div class="form-tag">
				<label for="Seitentitel">Seitentitel<sup>*</sup></label>
					<div>
						<input type="text" name="Seitentitel" value="<?php $_GET["Seitentitel"];?>" required />
					</div>
			</div>
			<p>Seitenbetreiber</p>
			<div class="form-tag">
			<label for="BetreiberName">Name<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberName" value="<?php $_GET["BetreiberName"];?>" required />
				</div>	
			</div>
			<div class="form-tag">
			<label for="BetreiberStrasse">Strasse<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberStrasse" value="<?php $_GET["BetreiberStrasse"];?>" required />
				</div>
			</div>
			<div class="form-tag">
			<label for="BetreiberHausnummer">Hausnummer<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberHausnummer" value="<?php $_GET["BetreiberHausnummer"];?>" required />
				</div>
			</div>
			<div class="form-tag">
			<label for="BetreiberLand">Land<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberLand" value="<?php $_GET["BetreiberLand"];?>" required />
				</div>
			</div>
			<div class="form-tag">
			<label for="BetreiberPlz">Postleitzahl<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberPlz" value="<?php $_GET["BetreiberPlz"];?>" required />
				</div>
			</div>
			<div class="form-tag">
			<label for="BetreiberOrt">Ort<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberOrt" value="<?php $_GET["BetreiberOrt"];?>" required />
				</div>
			</div>
			
		</section>
		<section class="right">
			<p>Kontakt</p>
			<div class="form-tag">
			<label for="BetreiberEmail">Email<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberEmail" value="<?php $_GET["BetreiberEmail"];?>" required />
				</div>
			</div>
			<div class="form-tag">
			<label for="BetreiberLandVorwahl">Ländervorwahl<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberLandVorwahl" value="<?php $_GET["BetreiberLandVorwahl"];?>" required />
				</div>
			</div>
			<div class="form-tag">
			<label for="BetreiberOrtVorwahl">Ortsvorwahl<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberOrtVorwahl" value="<?php $_GET["BetreiberOrtVorwahl"];?>" required />
				</div>
			</div>
			<div class="form-tag">
			<label for="BetreiberTelefon">Telefon<sup>*</sup></label>
				<div>
					<input type="text" name="BetreiberTelefon" value="<?php $_GET["BetreiberTelefon"];?>" required />
				</div>
			</div>
		</section>
		<input type="hidden" name="gesendet" value="ja2"/>
		<input type="hidden" name="Seite" value="einstellungen.php"/>
	</form>
	<input type="submit" value="Speichern" class="btn-senden" form="Seiteneinstellungen"/>
</main>