
<?php $config = $emailBasic ?? []; ?>

<div class="blogBasic_container">
<h1>
    <?= $config['addSectTitle'] ?? 'Echo-Traceback'; ?>
</h1>
<p class="blogBasic_content">
    <?= $config['addSectText'] ?? 'Send an Echo'; ?>
</p>


<form method="POST" action="">
<div class="emailBasic_flexRow">
  <span class="emailBasic_formEl">

    <input name="to_mod"
        class="emailBasic" 
        placeholder="<?= $config['toModLine'] ?? 'MOD'; ?>" 
        required>
  </span>
  <span class="emailBasic_formEl">

    <input name="to_dom" 
        class="emailBasic" 
        placeholder="<?= $config['toDomLine'] ?? 'DOM'; ?>" 
        required>
  </span>
  </div>
  <span class="blogBasic_formEl">

    <input name="branchTitle" 
        placeholder="<?= $config['subjectLine'] ?? 'Subject'; ?>" 
        required>
  </span>
    <br>
  <span class="blogBasic_formEl">
    <textarea name="branchLeaf" 
    placeholder="<?= $config['placeholderBody'] ?? 'Body'; ?>" 
    required></textarea>
  </span>
    <br>
  <input type='hidden' name='sys' value='<?php echo "$sys";?>'/> 
  <input type='hidden' name='from_dom' value='<?php echo "$dom";?>'/> 
  <input type='hidden' name='from_mod' value='<?php echo "$mod";?>'/> 

  <button type="submit">Submit</button> 

<span class="blogBasic_postMsg">

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo $config['confirmMsg'] ?? 'Post accepted.';
 } 
 ?>

</span>
</form>
