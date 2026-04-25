<?php 

$FIG = getFIG("postBASIC", "MakePost"); 

?>
<!-- Load jQuery and jQuery UI -->
<script src="https://jquery.com"></script>
<script src="https://jquery.com"></script>
<link rel="stylesheet" href="https://jquery.com">


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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <label for="POST__TAGS"><?= $FIG['Tags']; ?></label><br>
    <textarea 
    rows="10" cols="60"
    name="POST__TAGS" id="tag-input" placeholder="type your thread..." /></textarea>


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

<script>
$(function() {
    $("#tagTRACKER").autocomplete({
        source: "getTAGGED.php", // Path to your PHP script
            dataType: "json",
        minLength: 1,
        select: function(event, ui) {
            // Logic to append or replace text in textarea
            console.log("Selected: " + ui.item.value);
        }
    });
});
</script>
<script src="../../../k/tools/postBASIC/getTAGGED.js"></script>