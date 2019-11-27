<?php
echo date("H:i:s");

$db = new mysqli('localhost','TestUser', 'root', 'drohnenProjekt');

$erg = $db->query("Select * from bilder") or die($db->error);

if($erg->num_rows){
  echo "<p>Datenvorhanden: Anzahl ";
  echo $erg->num_rows;
}

$datensatz = $erg->fetch_all(MYSQLI_ASSOC);

foreach($datensatz as $zeile) {
  echo '<br>';
  echo '<br> ' . $zeile['ID'] ;
  echo '<br> ' . $zeile['Bildname'] ;

  $bild = $zeile['Bild'];
  echo "<img scr='$bild'>";
  echo '<br> ' . $zeile['Zeitstempel'] ;
}
//$pfad = "C:\Users\Alexander\Desktop\DrohnenBilder";


	?>
