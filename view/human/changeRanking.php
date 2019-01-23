<?php
namespace view\human;
?><!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title><?= $bean->getViewName() ?? '' ?></title>
</head>
<body>
<div><?= $bean->getMessage()['message'] ?? '' ?> </div>
<p><?= $bean->getViewName() ?? '' ?></p>
<form method="GET">
    <table border="1">
        <tr>
            <?php $this->printTableHeader($bean->getOutputArray()['arrColumn']) ?>
        </tr>
            <?php $this->printTableByArr($bean->getResult()) ?>
    </table>
</form>
<a href='/public/index.php?c=human/table'><?= $bean->getNextViewName()['nextViewName'] ?? '' ?></a>
</body>
</html>