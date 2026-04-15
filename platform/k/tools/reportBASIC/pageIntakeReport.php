
<?php 
require __DIR__ . '/-SIG-reportBASIC.php';
$SITE = $GLOBALS['SITE'];

$THEME = $GLOBALS[$SITE]["ROOM_FLAVOR"];
$SIGFIG = $GLOBALS['TOOL']['SIGFIG'][$THEME]['IntakeReport'] ?? []; 
?>

<form method="POST" action="">
<span class="">
    <label for="POST__REPORTER"><?= $SIGFIG['Reporter']; ?></label>
    <input 
        name="POST__REPORTER" 
        value="<?= $SIGFIG['Reporter_default']; ?>"
        placeholder="<?= $SIGFIG['Reporter_plhldr']; ?>" 
        required>
    <br>
</span>
<span class="">
    <label for="POST__TIMBER_TOPIC"><?= $SIGFIG['Topic']; ?></label>
    <input 
        name="POST__TIMBER_TOPIC" 
        placeholder="<?= $SIGFIG['Topic_plhldr']; ?>" 
        required>
    <br>
    <br>
</span>
<span class="">
    <label for="POST__TIMBER_LEAF"><?= $SIGFIG['Text']; ?></label><br>
    <textarea 
    rows="10" cols="60"
    name="POST__TIMBER_LEAF" 
    placeholder="<?= $SIGFIG['Text_plhldr']; ?>" 
    required></textarea>
    <br>
</span>
    <input 
        name="POST__TAGS" 
        placeholder="Tags">
    <br>
<span class="">
    <label for="POST__EVENT_UNIX"><?= $SIGFIG['UNIX']; ?></label><br>
    <input 
        name="POST__EVENT_UNIX" 
        placeholder="<?= $SIGFIG['UNIX_plhldr']; ?>"
        type="number">
    <br>
</span>

  <input type='hidden' name='POST__SYS' value='<?= $sys; ?>''/> 
  <input type="hidden" name="POST__TZ" id="tz-input">

  <button 
    type="submit">
    <?= $SIGFIG['Submit_Button'] ?? 'Submit'; ?>
  </button> 

  <span>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $SIGFIG['Confirmation_Msg'];
    } 
    ?>

    </span>
    </form>

<script>
  document.getElementById('tz-input').value = Intl.DateTimeFormat().resolvedOptions().timeZone;
</script>
