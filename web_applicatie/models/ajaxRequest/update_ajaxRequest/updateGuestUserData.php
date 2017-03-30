<?php

    require "../pdo_connection.php";
    require "../upload_images.php";

    function updateGuestUserData()
    {

        $pdo = pdo();

        $username = htmlspecialchars($_GET['username']);
        $email = htmlspecialchars($_GET['email']);
        $newPass = htmlspecialchars($_GET['newPass']);
        $current_pass = sha1(htmlspecialchars($_GET['current_pass']));

        $select = $pdo->prepare("SELECT*FROM guest_users WHERE guest_password=?");
        $select->execute(array($current_pass));
        $data_fetch = $select->fetch();
        $pass_check = $select->rowCount();


        $selectSg = $pdo->prepare("SELECT*FROM super_guest_users WHERE password=?");
        $selectSg->execute(array($current_pass));
        $data_fetchSg = $selectSg->fetch();
        $pass_checkSg = $selectSg->rowCount();



        if(!empty($username) AND !empty($current_pass))
        {

            $usernameCount = $pdo->prepare("SELECT guest_username FROM guest_users WHERE guest_username=?");
            $usernameCount->execute(array($username));
            $usernam_check = $usernameCount->rowCount();

            $usernameCounte = $pdo->prepare("SELECT username FROM super_guest_users WHERE username=?");
            $usernameCounte->execute(array($username));
            $username_check = $usernameCounte->rowCount();

            if($pass_check > 0 AND $current_pass == $data_fetch['guest_password'] AND $username != $data_fetch['guest_username'])
            {

              if($usernam_check == 0 AND $username_check == 0)
              {

                $update_username = $pdo->prepare("UPDATE guest_users SET guest_username=? WHERE guest_password=?");
                $update_username->execute(array($username, $current_pass));

                $updateGuest_username = $pdo->prepare("UPDATE super_guest_users SET username=? WHERE password=?");
                $updateGuest_username->execute(array($username, $current_pass));
                echo "Username is updated...";

              }else{

                 echo "This username is already used...";

              }

            }else{

               echo "Wrong Current password or The new username is the same as the old one of this username is already used";

            }

        }else if(!empty($email) AND !empty($current_pass))
        {

             $emailCount = $pdo->prepare("SELECT guest_email FROM guest_users WHERE guest_email=?");
             $emailCount->execute(array($email));
             $email_check = $emailCount->rowCount();


             if($pass_check > 0 AND $current_pass == $data_fetch['guest_password'] AND $email != $data_fetch['guest_email'])
             {

               if($email_check == 0)
               {

                 $update_email = $pdo->prepare("UPDATE guest_users SET guest_email=? WHERE guest_password=?");
                 $update_email->execute(array($email, $current_pass));
                 echo "email is updated...";

               }else{

                  echo "This email is already used...";

               }

             }else{

                echo "Wrong Current password or The new email is the same as the old one of this email is already used";

             }

        }else if(!empty($newPass) AND !empty($current_pass))
        {

             $passwordCount = $pdo->prepare("SELECT guest_password FROM guest_users WHERE guest_password=?");
             $passwordCount->execute(array($newPass));
             $password_check = $passwordCount->rowCount();

             $passwordCounte = $pdo->prepare("SELECT password FROM super_guest_users WHERE password=?");
             $passwordCounte->execute(array($newPass));
             $passworde_check = $passwordCounte->rowCount();

            if($pass_check > 0 AND $current_pass == $data_fetch['guest_password'] AND $newPass != $data_fetch['guest_password'])
            {

               if($password_check == 0 AND $passworde_check == 0)
               {

                 $newPass_len = strlen($newPass);
                 if($newPass_len > 7)
                 {

                   $update_newPass = $pdo->prepare("UPDATE guest_users SET guest_password=? WHERE guest_password=?");
                   $update_newPass->execute(array(sha1($newPass), $current_pass));

                   $updateGuest_newPass = $pdo->prepare("UPDATE super_guest_users SET password=? WHERE password=?");
                   $updateGuest_newPass->execute(array(sha1($newPass), $current_pass));
                   echo "password is updated...";

               }else{


                 echo "Password should be longer than 7 letters";

               }

               }else{

                  echo "Password not accepted...";

               }

            }else{

               echo "Wrong Current password or The new password is the same as the old one of this password is already used";

            }

        }else if(!empty($_FILES['usersAvatar']) AND !empty($current_pass))
        {

             if($pass_check > 0 AND $current_pass == $data_fetch['guest_password'])
             {

               $uploadImage = uploadImages(

                     'usersAvatar',

                     "../../../../../bemika_cms/public/media/uploadedAvatar/",

                      "300000",

                      "UPDATE guest_users SET guest_avatar=? WHERE guest_password=?",

                       array($_FILES['usersAvatar']['name'], $current_pass),

                      "SELECT guest_avatar FROM guest_users WHERE guest_password=?",

                      array($current_pass)

                    );

                    echo "Avatar uploaded";

             }else{

                echo "Wrong password";

             }

        }

    }

  updateGuestUserData();

 ?>
