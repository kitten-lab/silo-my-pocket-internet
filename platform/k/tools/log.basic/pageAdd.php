
<?php $config = $logBasic ?? []; ?>

<div class="logBasic_commonBox">
<h1><?= $config['addSectTitle'] ?? 'New Log Entry'; ?></h1>
<p class="logBasic_content">
    <?= $config['addSectText'] ?? 'Add a new leaf to my log!'; ?>
</p>


<form method="POST" action="">
  <span class="logBasic_formEl">
    <input name="log_leafTopic" 
        placeholder="<?= $config['placeholderTitle'] ?? 'Leaf Topic'; ?>" 
        required>
  </span>
    <br>
  <span class="logBasic_formEl">
    <textarea name="log_leafText" 
    placeholder="<?= $config['placeholderBody'] ?? 'Leaf textarea'; ?>" 
    required></textarea>
  </span>
    <br>
  <input type='hidden' name='cwEPC' value='EPO7.GAIA'/> 
  <input type='hidden' name='betSys' value='<?php echo "$sys";?>'/> 
  <input type='hidden' name='betDom' value='<?php echo "$dom";?>'/> 
  <input type='hidden' name='betMod' value='<?php echo "$mod";?>'/> 

  <button type="submit">Submit</button> 

<span class="logBasic_postMsg">

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo $config['confirmMsg'] ?? 'Post accepted.';
 } 
 ?>

</span>
</form>
