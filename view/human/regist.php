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
<form method="POST">
    <div>
        <input type="text" name="name" placeholder="名前" maxlength="15" required/>
    </div>
    <div>
        <input type="number" name="age" placeholder="年齢" maxlength="3" min="0" required/>
    </div>
    <div>
        <input type="email" name="email" placeholder="メールアドレス" maxlength="255" required/>
    </div>
    <input type="submit" name="regist" value="登録"/>
</form>
<a href="<?= '/public/index.php?c=human/table' ?>"><?= $bean->getNextViewName()['nextViewName'] ?? '' ?></a>
</body>
</html>
