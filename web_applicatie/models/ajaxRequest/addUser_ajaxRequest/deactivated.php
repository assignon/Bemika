<?php

     require "../pdo_connection.php";
     require "../sendMail.php";

     function deactivated()
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
               $update->execute(array("2", "#F39200", $guest_name));

               $changePass = $pdo->prepare("UPDATE guest_users SET guest_password=? WHERE guest_name=?");
               $changePass->execute(array(sha1($temporaryPass) ,$guest_name));

               $changePasse = $pdo->prepare("UPDATE super_guest_users SET password=? WHERE username=?");
               $changePasse->execute(array(sha1($temporaryPass) ,$guest_name));

               $select = $pdo->prepare("SELECT guest_email FROM guest_users WHERE guest_name=?");
               $select->execute(array($guest_name));
               $email  = $select->fetch();


               send_mail(

                   "Your account is deactivated",
                   "You have temporary no access.",
                   "Team Avengers",
                   "teamavengers@gmail.com",
                   $email['guest_email']

               );

               echo "Guest user Deactivated. An e-mail was sent to him to warn him.";

         }else{

            echo "Wrong password";

         }




     }

     deactivated();

 ?>
