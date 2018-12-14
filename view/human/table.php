<?php
//include_once(dirname(__FILE__) . '/../../model/human/table.php');
?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $tableViewName ?></title>
</head>
<body>
<div><?= $message ?></div>
<p><?= $tableViewName ?></p>
<form method="GET">
    <table border="1">
        <tr>
            <?php $this->printHumanTableHeader($arrColumn)  ?>
        </tr>
        <?php $this->printHumanTable($result, $arrColumn) ?>
    </table>
</form>
<a href="regist.php"><?= $registViewName ?></a>
</body>
</html>
