<?php
include_once dirname(__FILE__) . '/db/iif_db.php';
$db = new IIFdb();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="Type=text/html; charset=utf-8"/>
  <meta http-equiv="refresh" content="300"/>
  <meta name="robots" content="index, follow, archive"/>
  <meta name="description"
        content="To digte. Avisernes overskrifter, der starter med 'Jeg' eller 'Vi', bliver samlet til to digte, der bliver længere og længere."/>
  <title>individ i fællesskab</title>
  <link type="text/css" rel="stylesheet" href="/style/style.css"/>
</head>
<body>
<div class="centerdiv">
  <div class="textfield-wrapper">
    <div class="textfield textfield-left">
      <?php
      $db->dbDumpWe();
      ?>
    </div>
    <div class="textfield textfield-right">
      <?php
      $db->dbDumpI();
      ?>
    </div>
  </div>
</div>
</body>
</html>
