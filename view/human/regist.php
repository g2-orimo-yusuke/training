<?php
?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $registViewName ?></title>
</head>
<body>
<div><?= $message ?></div>
<p><?= $registViewName ?></p>
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
    <div>
        <input type="submit" name="regist" value="登録"/>
    </div>
</form>
<a href="<?= '/controller/human/table.php' ?>"><?= $tableViewName ?></a>
</body>
</html>
