<?php
echo date("H:i:s");

$db = new mysqli('localhost','TestUser', 'root', 'test');

$erg = $db->query("Select * from testdaten") or die($db->error);

if($erg->num_rows){
  echo "<p>Datenvorhanden: Anzahl ";
  echo $erg->num_rows;
}

$datensatz = $erg->fetch_all(MYSQLI_ASSOC);

foreach($datensatz as $zeile) {
  echo '<br>';
  echo '<br>' . $zeile['Nummer'] . ' ' . $zeile['Name'] . ' ' . $zeile['Datum'] ;
}

/*     hässliche Auflistung
echo "<pre>";
print_r($datensatz);
echo "</pre>"
*/

?>
