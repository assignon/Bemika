<?php

    require "../pdo_connection.php";

    function displayAVATAR()
    {

        $pdo = pdo();
        $password = sha1($_GET['pass']);

        $select = $pdo->query('SELECT*FROM super_user');
        //$select->execute(array($password));
        $display = $select->fetch();

        echo ".../../../bemika_cms/public/media/login_uploaded_images/".$display['avatar'];




    }
    displayAVATAR();

 ?>
