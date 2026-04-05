
<?php foreach ($GLOBALS['GETS']['actor'] as $fn) {
    $fn();
} ?>
<!-- .... DEAR INFINITE POTENTIAL, HOLY DOCTYPE... -->
<!DOCTYPE html>
<html><head>

<?php 
foreach ($GLOBALS['GETS']['dressing'] as $fn) {
    $fn();
} ?>
<?php getMy_Styles(); ?>
<title><?= $pageTitle ?></title>

</head>
<!-- END OPENING PRAYERS -->
<body>

<?php include 'header.php'; ?>

<main>

<?php foreach ($GLOBALS['GETS']['set'] as $fn) {
    $fn();
} ?>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
<!-- AMEN -->