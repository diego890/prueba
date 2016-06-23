<?php 
	include ('../scripts/funciones.php');
	$auditores = getAuditores();
?>
<select name="responsables[]" class="form-control">
  <?php foreach ($auditores as $auditor): ?>
  <option value="<?= $auditor[0] ?>"><?= $auditor[4] ?></option>
  <?php endforeach; ?>
</select>