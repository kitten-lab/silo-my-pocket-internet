
<?php $config = $blogBasic ?? []; ?>

<div class="blogBasic_container">
<h1><?= $config['addSectTitle'] ?? 'My Blog'; ?></h1>
<p class="blogBasic_content">
    <?= $config['addSectText'] ?? 'Add a new post to my blog!'; ?>
</p>


<form method="POST" action="">
  <span class="blogBasic_formEl">
    <input name="log_leafTopic" 
        placeholder="<?= $config['placeholderTitle'] ?? 'Subject'; ?>" 
        required>
  </span>
    <br>
  <span class="blogBasic_formEl">
    <textarea name="log_leafText" 
    placeholder="<?= $config['placeholderBody'] ?? 'Body'; ?>" 
    required></textarea>
  </span>
    <br>
  <input type='hidden' name='chIMP_EPC' value='EPO7 GAIA'/> 
  <input type='hidden' name='betSys' value='<?php echo "$sys";?>'/> 
  <input type='hidden' name='betDom' value='<?php echo "$dom";?>'/> 
  <input type='hidden' name='betMod' value='<?php echo "$mod";?>'/> 

  <button type="submit">Submit</button> 

<span class="blogBasic_postMsg">

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo $config['confirmMsg'] ?? 'Post accepted.';
 } 
 ?>

</span>
</form>
