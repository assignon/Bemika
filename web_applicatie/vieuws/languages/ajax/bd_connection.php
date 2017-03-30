<?php

    function pdo()
    {

             $pdo= new PDO("mysql:host=localhost;dbname=bemika_cms",'root','');
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        return  $pdo;

    }

 ?>
