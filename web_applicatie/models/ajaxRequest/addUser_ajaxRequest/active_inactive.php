<?php

      require "../pdo_connection.php";

      function active_inactive()
      {

          $pdo = pdo();

          $guest_name = htmlspecialchars($_GET['guest_name']);


              $select = $pdo->prepare("SELECT active FROM guest_users WHERE guest_name=?");
              $select->execute(array($guest_name));
              $checkStatus = $select->fetch();

              if($checkStatus['active'] == 1)
              {

                 echo "Status(Active)";

              }else if($checkStatus['active'] == 2){

                echo "Status(Inactive)";

              }




      }

      active_inactive();

 ?>
