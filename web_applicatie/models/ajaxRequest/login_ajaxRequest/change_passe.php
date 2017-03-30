<?php

     require "../pdo_connection.php";
     require "../sendMail.php";

     function change_password()
     {

           $pdo = pdo();

           $userEmail_val = htmlspecialchars($_GET['data']);

           $select = $pdo->prepare("SELECT*FROM super_user WHERE super_user=? OR email=?");
           $select->execute(array($userEmail_val, $userEmail_val));
           $user_dataCount = $select->rowCount();



               $randString = "abcdefghijklmnopqrstuvwxyz";
                $randString .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $temporaryPassword = "";

                $length = strlen($randString);
                $nb = 0;

                while($nb < 20)
                {

                      $temporaryPassword .= $randString[rand(0,$length-1)];
                      $nb++;

                }


           if($user_dataCount == 1)
           {

              $display_userData = $select->fetch();

              $update_pass = $pdo->prepare("UPDATE super_user SET password=? WHERE super_user=? OR email=?");
              $update_pass->execute(array(sha1($temporaryPassword), $userEmail_val, $userEmail_val));

              send_mail(

                  "Password Recovery",
                  "Your new temporary password:<br/>Temporary password:".' '.$temporaryPassword."<br/>don't forget to change it once logged in",
                  "Team Avengers",
                  "teamavengers@gmail.com",
                  $display_userData['email']

              );

              echo " An email is sent to your email where your new password is located.".' '.$temporaryPassword;

           }else{

              echo "Wrong Username of Email...";

           }

     }

     change_password();

 ?>
