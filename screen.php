<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Contadinhos</title>
  </head>

<body>
<div>
<center>

<?php 
if (isset ($_GET ["d"])){
$d = $_GET ["d"];


if ($d == 1){
	$today = date("Y-m-d 00:00:00");
	echo '<h1>' . 'Falações de hoje' . '</h1>';
		}
	
	else if ($d == 3){
	$minuto = 60;
	$hora = 60*$minuto;
	$dia = 24*$hora;	
	$tres = 3;
	$today = date("Y-m-d", time() - $tres*$dia);
	
	echo '<h1>' . 'Últimos três dias' . '</h1>';
	
		}
	
	else if ($d == 7){
	$minuto = 60;
	$hora = 60*$minuto;
	$dia = 24*$hora;	
	$sete = 7;
	$today = date("Y-m-d", time() - $sete*$dia);
	
	echo '<h1>' . 'Últimos sete dias' . '</h1>';
		}
}	

include('functions.php');

// calcula hashtags para dilma no dia de hoje
$dilma = getCount('#dilma', $today);

//calcula hashtags para aecio no dia de hoje
$aecio = getCount('#aecio', $today);

//calcula hashtags para campos
$campos = getCount('#eduardocampos', $today);

echo "campos es: $campos.";
//Calcula percentuais

$total = ($campos + $aecio + $dilma);

$perDilma = (($dilma*100/$total)/100); //calcula para Dilma
$perAecio = (($aecio*100/$total)/100); //calcula para Aecio
$perCampos = (($campos*100/$total)/100); //calcula para Campos

echo $perDilma
 
?>

<table>
<tr>
<td valign=bottom align=center><img src="images/aecio.png" width="<?= 480 * $perAecio ?>" height="<?= 580 * $perAecio ?>"/></td>
<td valign=bottom align=center><img src="images/dilma.png" width="<?= 800 * $perDilma ?>" height="<?= 580 * $perDilma ?>"/></td>
<td valign=bottom align=center><img src="images/campos.png" width="<?= 800 * $perCampos?>" height="<?= 580*$perCampos ?>"/></td>
</tr>
<tr>
<td id="celula1"><h3>#aecioneves: <?= $aecio ?> menções</h3></td>
<td id="celula1"><h3>#dilmaroussef: <?= $dilma ?> menções</h3></td>
<td id="celula1"><h3>#eduardocampos: <?= $campos ?> menções</h3></td>
</tr>

<tr>
<td></td>
<td><center><h3><a class="but" href="startpage.php">Voltar à página inicial</a></h3></center></td></tr>
<td></td>
</table>


<table>
<tr>
	<td id="celula2">
    
	<table style="width:320px" id="alter">
	<?php
	$connection = mysqli_connect("localhost", "electionsdata", "3l3ct10ns", "elections");
	mysqli_set_charset($connection, "utf8");
	
	$qaecioDados = "SELECT text, user_name, location, image, created_at FROM twitterdata WHERE hashtag = '#aecio' ORDER BY created_at DESC limit 5";
	$resultaecioDados = mysqli_query($connection, $qaecioDados);
	
	echo '<tr><td id="celula2"><h4>'. 'O que estão dizendo sobre Aécio:' . '</h4></td></tr>';
	
	  while($rowaecioDados = mysqli_fetch_assoc($resultaecioDados)){
		$aecioText = $rowaecioDados['text'];
		$aecioUser = $rowaecioDados['user_name'];
		$aecioLocation = $rowaecioDados['location'];
		$aecioImage = $rowaecioDados['image'];
		$aecioDate = $rowaecioDados['created_at'];
	
		echo '<tr class="dif"><td id="celula2"><p class="first">'. '<img src=\'' . $aecioImage . '\'/>' . ' (@' . $aecioUser . ')' . ' at ' . $aecioDate . '</p><p>' . $aecioText . '</p></td></tr>';
}
	
	
	?>
	</table>
	</td>
	
	<td id="celula2">
    <table style="width:320px" id="alter">
	<?php
		
	$qdilmaDados = "SELECT text, user_name, location, image, created_at FROM twitterdata WHERE hashtag = '#dilma' ORDER BY created_at DESC limit 5";
	$resultdilmaDados = mysqli_query($connection, $qdilmaDados);

	echo '<tr><td id="celula2"><h4>'. 'O que estão dizendo sobre Dilma:' . '</h4></td></tr>';
	
	while($rowdilmaDados = mysqli_fetch_assoc($resultdilmaDados)){
		$dilmaText = $rowdilmaDados['text'];
		$dilmaUser = $rowdilmaDados['user_name'];
		$dilmaLocation = $rowdilmaDados['location'];
		$dilmaImage = $rowdilmaDados['image'];
		$dilmaDate = $rowdilmaDados['created_at'];

		echo '<tr class="dif"><td id="celula2"><p class="first">'. '<img src=\'' . $dilmaImage . '\'/>' . ' (@' . $dilmaUser . ')' . ' at ' . $dilmaDate . '</p><p>' . $dilmaText . '</p></td></tr>';
		}
	
	?>
	</table>
	</td>
	
	<td id="celula2">
    <table style="width:320px" id="alter">
	<?php
	
	$qcamposDados = "SELECT text, user_name, location, image, created_at FROM twitterdata WHERE hashtag = '#eduardocampos' ORDER BY created_at DESC limit 5";
	$resultcamposDados = mysqli_query($connection, $qcamposDados);
		
		echo '<tr><td id="celula2"><h4>'. 'O que estão dizendo sobre Campos:' . '</h4></td></tr>';
		
	while($rowcamposDados = mysqli_fetch_assoc($resultcamposDados)){
		$camposText = $rowcamposDados['text'];
		$camposUser = $rowcamposDados['user_name'];
		$camposLocation = $rowcamposDados['location'];
		$camposImage = $rowcamposDados['image'];
		$camposDate = $rowcamposDados['created_at'];
	
			echo '<tr class="dif"><td id="celula2"><p class="first">'. '<img src=\'' . $camposImage . '\'/>' . ' (@' . $camposUser . ')' . ' at ' . $camposDate . '</p><p>' . $camposText . '</p></td></tr>';
		}
	?>
	</table>
	</td>

</tr>
</table>

</center>
</div>
</body>
</html>
 