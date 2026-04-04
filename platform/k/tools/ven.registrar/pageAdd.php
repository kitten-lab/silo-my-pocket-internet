
<?php $config = $blogBasic ?? []; ?>

<div class="venRegistrar_commonBox">
<form method="POST" action="">
<span class="formLabel wide"><?= date('\RY \E\Dm:\E\Tw:\E\Nd') ?> 
<select name="chIMP_EPC" id="chIMP_EPC">
  <option value="EPO7 GAIA">EPO7 GAIA</option>
</select> </span><br>
<span class="formLabel">venNumb:</span>

<input name="venR_venNum"
    placeholder="ABC" maxlength="3" size="3"
    required>-<input name="venR_venNum"maxlength="3" size="3"
    placeholder="123"
    required> 
<select name="chIMP_EPC" id="chIMP_EPC">
  <option value="Type">Unset Type</option>
  <option value="Type">Place</option>
  <option value="Type">Thing</option>
  <option value="Type">Person</option>
</select><br>
<span class="formLabel">keyLabel:</span>
<span><input name="ven.keyLabel" placeholder="Reference Name(discreet but memorable)" size="40"></span><br>
<span class="formLabel">keyName:</span>
<input name="ven.keyName" placeholder="In-World Names(usable)" size="40"><br>
<span class="formLabel" >scrubName:</span>
<input name="ven.scrubName" placeholder="True names used in logs(scrub later)" size="40"><br>
<textarea name="venR_venNum" placeholder="Notes for forest.source (if applicable)" size="40" cols="53" rows="5"></textarea>
    <br>
  <input type='hidden' name='betSys' value='<?php echo "$sys";?>'/> 
  <input type='hidden' name='betDom' value='<?php echo "$dom";?>'/> 
  <input type='hidden' name='betMod' value='<?php echo "$mod";?>'/> 

  <button type="submit">Send to source</button> 
</div>
<span class="blogBasic_postMsg">

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo $config['confirmMsg'] ?? 'Post accepted.';
 } 
 ?>

</span>
</form>
