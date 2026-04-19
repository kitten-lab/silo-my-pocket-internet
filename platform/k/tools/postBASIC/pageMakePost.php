<?php 

$FIG = getFIG("postBASIC", "MakePost"); 

?>

<form method="POST" action="">
<span class="">
    <label for="POST__TIMBER_TOPIC"><?= $FIG['Topic']; ?></label><br>
    <textarea 
    rows="1" cols="60"
    name="POST__TIMBER_TOPIC" 
    placeholder="<?= $FIG['Topic_plhldr']; ?>" 
    required></textarea>
    <br>
</span>
<span class="">
    <label for="POST__TIMBER_LEAF"><?= $FIG['Content']; ?></label><br>
    <textarea 
    rows="10" cols="60"
    name="POST__TIMBER_LEAF" 
    placeholder="<?= $FIG['Content_plhldr']; ?>" 
    required></textarea>
    <br>
</span>
    <label for="POST__TAGS"><?= $FIG['Tags']; ?></label><br>
    <textarea 
    rows="10" cols="60"
        name="POST__TAGS" 
        placeholder="Tags">
        </textarea>
    <br>
<span class="">
    <label for="POST__EVENT_UNIX"><?= $FIG['UNIX']; ?></label><br>
    <input 
        name="POST__EVENT_UNIX" 
        placeholder="<?= $FIG['UNIX_plhldr']; ?>"
        type="number">
    <br>
</span>

  <input type="hidden" name="POST__TZ" id="tz-input">

  <button type="submit">
    <?= $FIG['Submit_Button'] ?? 'Submit'; ?>
  </button> 

  <span>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $FIG['Confirmation_Msg'];
    } 
    ?>

    </span>
    </form>

<script>
  document.getElementById('tz-input').value = Intl.DateTimeFormat().resolvedOptions().timeZone;
</script>
