
<?php require __DIR__ . '/../../systems/rehydrateSelf.php'; ?>

<form method="POST" action="">

<input class="WORLD_NAME" name="WORLD_NAME" placeholder="WORLD_NAME" required><br>
<input class="SYS" name="SYS" placeholder="SYS" required><br>
<input class="DOM" name="DOM" placeholder="DOM" required><br>
<input class="MOD" name="MOD" placeholder="MOD" required><br>

  <input type='hidden' name='betSys' value='<?= $sys ?>'/> 
  <input type='hidden' name='betDom' value='<?= $dom ?>'/> 
  <input type='hidden' name='betMod' value='<?= $mod ?>'/> 
  <input type="hidden" name="betTZone" id="tz-input">
  <button type="submit">CREATE WORLD</button> 
</div>
<span>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo $config['CONFIRM_MSG'] ?? 'WORLD CREATED.';
 } 
 ?>

</span>
</form>

<script>
  document.getElementById('tz-input').value = Intl.DateTimeFormat().resolvedOptions().timeZone;
</script>