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
        <input type="text" name="id" value="<?= $bean->getResult()['id'] ?? '' ?>" readonly/>
    </div>
    <div>
        <input type="text" name="name" placeholder="名前" maxlength="15" value="<?= $bean->getResult()['name'] ?? '' ?>"
               required/>
    </div>
    <div>
        <input type="number" name="age" placeholder="年齢" maxlength="3" min="0" required
               value="<?= $bean->getResult()['age'] ?? '' ?>"/>
    </div>
    <div>
        <input type="email" name="email" placeholder="メールアドレス" maxlength="255"
               value="<?= $bean->getResult()['email'] ?? '' ?>"
               required/>
    </div>
    <div>
        <input type="submit" name="change" value="変更"/>
        <input type="submit" name="delete" value="削除"/>
    </div>
</form>
<a href='/public/index.php?c=human/table'><?= $bean->getNextViewName()['nextViewName'] ?? '' ?>へ戻る</a>
</body>
</html>
