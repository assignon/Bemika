<?php

     require "../pdo_connection.php";
     require "../sendMail.php";

     function activated()
     {

         $pdo = pdo();
         $guest_name = htmlspecialchars($_GET['guest_name']);
         $password = htmlspecialchars($_GET['passVal']);


         $randString = "abcdefghijklmnopqrstuvwxyz";
          $randString .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
          $randString .= "0123456789";
          $temporaryPass = "";

          $length = strlen($randString);
          $nb = 0;

          while($nb < 20)
          {

                $temporaryPass .= $randString[rand(0,$length-1)];
                $nb++;

          }

         $selectPass = $pdo->prepare("SELECT password FROM super_user WHERE password=?");
         $selectPass->execute(array(sha1($password)));
         $displayPass = $selectPass->fetch();
         $checkPass = $selectPass->rowCount();

         if($checkPass > 0 AND sha1($password) == $displayPass['password'])
         {

             $update = $pdo->prepare("UPDATE guest_users SET active=?, status_color=? WHERE guest_name=?");
             $update->execute(array("1", "green", $guest_name));

             $selectPass = $pdo->prepare('SELECT guest_password FROM guest_users WHERE guest_name=?');
             $selectPass->execute(array($guest_name));
             $displayPass = $selectPass->fetch();

             $select = $pdo->prepare("SELECT guest_email FROM guest_users WHERE guest_name=?");
             $select->execute(array($guest_name));
             $email  = $select->fetch();

            //echo $displayPass['guest_password'];

             send_mail(

                 "Your account is activated",
                 "You have now access with a temporary password.<br/>Temporary password:".' '.$displayPass['guest_password']."<br/>",
                 "Team Avengers",
                 "teamavengers@gmail.com",
                 $email['guest_email']

             );

             echo 'Activated, An email is send to the current guest user whith een temporary password';

         }else{

            echo "Wrong password...";

         }



     }

     activated();

 ?>
