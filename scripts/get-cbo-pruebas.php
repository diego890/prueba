<?php 
	include ('../scripts/funciones.php');
	$pruebas = getPruebas($_GET["id"]);
?>

  <?php foreach ($pruebas as $prueba): ?>
  <option value="<?= $prueba[0] ?>"><?= $prueba[2] ?></option>
  <?php endforeach; ?>
