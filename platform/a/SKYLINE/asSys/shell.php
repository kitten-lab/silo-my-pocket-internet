
<?php if (!empty($pageLogic) && file_exists($pageLogic)) 
    {require_once $pageLogic;  }; ?>
<!-- .... DEAR INFINITE POTENTIAL, HOLY DOCTYPE... -->
<!DOCTYPE html>
<html><head>

<?php a_css("style.css",$sys,"asSys"); ?>

<title><?= $pageTitle ?></title>

</head>
<!-- END OPENING PRAYERS -->
<body>

<?php include 'header.php'; ?>

<main>
<?php if (!empty($pageSlug) && file_exists($pageSlug)) 
    {require_once $pageSlug;  }; ?>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
<!-- AMEN -->