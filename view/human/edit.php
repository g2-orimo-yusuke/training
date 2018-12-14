<?php
?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $editViewName ?></title>
</head>
<body>
<div><?= $message ?></div>
<p><?= $editViewName ?></p>
<form method="POST">
    <div>
        <input type="text" name="id" value="<?= $result['id'] ?>" readonly/>
    </div>
    <div>
        <input type="text" name="name" placeholder="名前" maxlength="15" value="<?= $result['name'] ?>" required/>
    </div>
    <div>
        <input type="number" name="age" placeholder="年齢" maxlength="3" min="0" required value="<?= $result['age'] ?>"/>
    </div>
    <div>
        <input type="email" name="email" placeholder="メールアドレス" maxlength="255" value="<?= $result['email'] ?>"
               required/>
    </div>
    <div>
        <input type="submit" name="change" value="変更"/>
        <input type="submit" name="delete" value="削除"/>
    </div>
</form>
<a href="table.php"><?= $tableViewName ?>へ戻る</a>
</body>
</html>
