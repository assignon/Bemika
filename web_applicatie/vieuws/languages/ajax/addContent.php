<?php

    require "bd_connection.php";

    $pdo = pdo();

    $titel = htmlspecialchars($_GET['titelVal']);
    $content = htmlspecialchars($_GET['content_val']);
    $langsName = htmlspecialchars($_GET['langsName']);

    $insert = $pdo->prepare("INSERT INTO content(titel, contents, languages) VALUES(?,?,?)");
    $insert->execute(array($titel,$content,$langsName));

 ?>
