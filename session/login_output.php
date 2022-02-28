<?php
    session_start();
    unset($_SESSION['customer']);
    $pdo=new PDO('mysql:host=localhost;dbname=shop;charset=utf8','staff', 'password');
    $sql=$pdo->prepare('select * from customer where login=? and password=?');
    $sql->execute([$_REQUEST['login'], $_REQUEST['password']]);
    foreach ($sql->fetchAll() as $row) {
        $_SESSION['customer']=[
            'id'=>$row['id'], 'name'=>$row['name'],
            'address'=>$row['address'], 'login'=>$row['login'],
            'password'=>$row['password']];
    }
    if (isset($_SESSION['customer'])) {
        echo '登入成功';
    } else {
        echo '登入失敗';
    }
?>