<?php
namespace view\human;
?><!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title><?= $bean->getViewName() ?? '' ?></title>
</head>
<body>
<div><?= $bean->getMessage()['message'] ?? '' ?></div>
<p><?= $bean->getViewName() ?></p>
<form method="GET">
    <table border="1">
        <tr>
            <?php $this->printTableHeader($bean->getOutputArray()['arrColumn'] ?? '')  ?>
        </tr>
        <?php $this->printHumanTable($bean->getResult(), $bean->getOutputArray()['arrColumn'] ?? array()) ?>
    </table>
</form>
<div>
    <a href='/public/index.php?c=human/regist'><?= $bean->getNextViewName()['nextViewName1'] ?? '' ?></a>
</div>
<div>
    <a href='/public/index.php?c=human/changeRanking'><?= $bean->getNextViewName()['nextViewName2'] ?? '' ?></a>
</div>
</body>
</html>
