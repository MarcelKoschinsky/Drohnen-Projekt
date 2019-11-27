<!DOCTYPE html PUBLIC>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP - Ordner auslesen und anzeigen</title>
<style type="text/css">
ul#galerie {
	padding:0;
	margin:0;
	list-style-type:none;
	font-family:Arial, Helvetica, sans-serif;
}
ul#galerie li{
	padding: 3px;
	background-color:#ebebee;
	border:1px solid #CCC;
	float:left;   //an den linken Bildschrimrand dran
	margin:0 10px 10px 0;
}
ul#galerie li:hover{
	border:1px solid #333;
}
ul#galerie li span{
	display:block;
	text-align:center;
	font-size:10px;
}
ul#galerie li a img{
		border:none;
}
</style>
</head>

<body>
<ul id="galerie">
<?php
// Ordnername
$ordner = "images";

// Ordner auslesen und Array in Variable speichern
$allebilder = scandir($ordner); // Sortierung A-Z
// Sortierung Z-A mit scandir($ordner, 1)
sort($allebilder);

// Schleife um Array "$alledateien" aus scandir Funktion auszugeben
// Einzeldateien werden dabei in der Variabel $datei abgelegt
foreach ($allebilder as $bild) {

	// Zusammentragen der Dateiinfo
	$bildinfo = pathinfo($ordner."/".$bild);

	// Größe ermitteln für Ausgabe
	$size = ceil(filesize($ordner."/".$bild)/1024);

	if ($bild != "." && $bild != ".."  && $bild != "_notes" && $bildinfo['basename'] != "Thumbs.db") {
	?>
    <li>
        <a href="<?php echo $bildinfo['dirname']."/".$bildinfo['basename'];?>">
        <img src="<?php echo $bildinfo['dirname']."/".$bildinfo['basename'];?>" width="140" alt="Vorschau" /></a>
        <span><?php echo $bildinfo['filename']; ?> (<?php echo $size ; ?>kb)</span>
    </li>
<?php
	};
 };
?>
</ul>
</body>
</html>
