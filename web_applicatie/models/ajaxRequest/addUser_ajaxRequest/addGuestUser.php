<?php

       require "../pdo_connection.php";
       require "../sendMail.php";


       function addGuest_users()
       {

           $pdo = pdo();

           $name = htmlspecialchars($_GET['name']);
           $email = htmlspecialchars($_GET['email']);
           $category = htmlspecialchars($_GET['category']);
           $updateVal = htmlspecialchars($_GET['updateVal']);
           $deleteVal = htmlspecialchars($_GET['deleteVal']);
           $uploadVal = htmlspecialchars($_GET['uploadVal']);
           $nPermission = htmlspecialchars($_GET['nPermission']);

           $randString = "abcdefghijklmnopqrstuvwxyz";
            $randString .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            $temporaryData = "";

            $length = strlen($randString);
            $nb = 0;

            while($nb < 20)
            {

                  $temporaryData .= $randString[rand(0,$length-1)];
                  $nb++;

            }


            $checkEmail = $pdo->prepare("SELECT guest_email FROM guest_users WHERE guest_email=?");
            $checkEmail->execute(array($email));
            $emailCount = $checkEmail->rowCount();


            $checkName = $pdo->prepare("SELECT guest_name FROM guest_users WHERE guest_name=?");
            $checkName->execute(array($name));
            $nameCount = $checkName->rowCount();

            if($emailCount == 0)
            {

              if($nameCount == 0)
              {

                    $insertUser = $pdo->prepare("INSERT INTO super_guest_users(username, password, grade) VALUES(?,?,?)");
                    $insertUser->execute(array($name, sha1($name.'_'.$temporaryData), "guest_users"));
                    $getGuestId = $pdo->prepare("SELECT id FROM super_guest_users WHERE username=?");
                    $getGuestId->execute(array($name));
                    $guestUserId = $getGuestId->fetch();

                    $insertUser = $pdo->prepare("INSERT INTO guest_users(guest_name, guest_username, guest_password, guest_email, guest_avatar, category, active, status_color, guest_id) VALUES(?,?,?,?,?,?,?,?,?)");
                    $insertUser->execute(array($name, $name, sha1($name.'_'.$temporaryData), $email, "guestAvatar.png", $category, 1, "green", $guestUserId['id']));


                    send_mail(

                        "Added as a administrator",
                        "Your new temporary username:<br/>". ' '.$name.' '."temporary password:<br/>Temporary password:".' '.$temporaryData."<br/>don't forget to change it once logged in",
                        "Team Avengers",
                        "teamavengers@gmail.com",
                        $email

                    );


                    $getId = $pdo->prepare("SELECT*FROM guest_users WHERE guest_email=?");
                    $getId->execute(array($email));

                    $display_id = $getId->fetch();

                    $insert_right = $pdo->prepare("INSERT INTO guest_rights(updating_right, deleting_right, uploading_right, need_permission, guestuser_id) VALUE(?,?,?,?,?)");
                    $insert_right->execute(array($updateVal, $deleteVal, $uploadVal, $nPermission, $display_id['id']));

                    echo "User added!<br/>Default Username = ".' '.$name."<br/>Default Password = ".' '.$name.'_'.$temporaryData."<br/>A message is sent to the new user.";


              }else{

                 echo "This name already exist";

              }
            }else{

               echo "This email already exist";

            }

       }

       addGuest_users();

 ?>
