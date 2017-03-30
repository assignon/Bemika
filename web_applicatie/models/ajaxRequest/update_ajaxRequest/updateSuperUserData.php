<?php

    require "../pdo_connection.php";
    require "../upload_images.php";

    function updateSuperUserData()
    {

        $pdo = pdo();

        $username = htmlspecialchars($_GET['username']);
        $email = htmlspecialchars($_GET['email']);
        $newPass = htmlspecialchars($_GET['newPass']);
        $current_pass = sha1(htmlspecialchars($_GET['current_pass']));

        $select = $pdo->prepare("SELECT*FROM super_user WHERE password=?");
        $select->execute(array($current_pass));
        $data_fetch = $select->fetch();
        $pass_check = $select->rowCount();

        if(!empty($username) AND !empty($current_pass))
        {

            if($pass_check > 0 AND $current_pass == $data_fetch['password'] AND $username != $data_fetch['super_user'])
            {

              $update_username = $pdo->prepare("UPDATE super_user SET super_user=? WHERE password=?");
              $update_username->execute(array($username, $current_pass));
              echo "Username is updated...";

            }else{

               echo "Wrong Current password or The new username is the same as the old one";

            }

        }else if(!empty($email) AND !empty($current_pass))
        {

             if($pass_check > 0 AND $current_pass == $data_fetch['password'] AND $email != $data_fetch['email'])
             {

               $update_email = $pdo->prepare("UPDATE super_user SET email=? WHERE password=?");
               $update_email->execute(array($email, $current_pass));
               echo "email is updated...";

             }else{

                echo "Wrong Current password or The new email is the same as the old one";

             }

        }else if(!empty($newPass) AND !empty($current_pass))
        {

            if($pass_check > 0 AND $current_pass == $data_fetch['password'] AND $newPass != $data_fetch['password'])
            {

               $newPass_len = strlen($newPass);
               if($newPass_len > 7)
               {

                 $update_newPass = $pdo->prepare("UPDATE super_user SET password=? WHERE password=?");
                 $update_newPass->execute(array(sha1($newPass), $current_pass));
                 echo "password is updated...";

               }else{

                  echo "Password should be longer than 7 letters";

               }

            }else{

               echo "Wrong Current password or The new password is the same as the old one";

            }

        }else if(!empty($_FILES['usersAvatar']) AND !empty($current_pass))
        {

             if($pass_check > 0 AND $current_pass == $data_fetch['password'])
             {

               $uploadImage = uploadImages(

                     'usersAvatar',

                     "../../../../../bemika_cms/public/media/uploadedAvatar/",

                      "300000",

                      "UPDATE super_user SET avatar=? WHERE password=?",

                       array($_FILES['usersAvatar']['name'], $current_pass),

                      "SELECT avatar FROM super_user WHERE password=?",

                      array($current_pass)

                    );

                    echo "Avatar uploaded";

             }else{

                echo "Wrong password";

             }

        }

    }

    updateSuperUserData();

 ?>
