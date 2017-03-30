<?php

    require "../pdo_connection.php";
    require "../sendMail.php";

    function changeRigths()
    {

            $pdo = pdo();

            $userGuest_name = htmlspecialchars($_GET['userGuest_name']);
            $superUser_pass = sha1($_GET['changeRights_passVal']);
            $upload = htmlspecialchars($_GET['upload']);
            $delete = htmlspecialchars($_GET['delete']);
            $update = htmlspecialchars($_GET['update']);
            $nPermission = htmlspecialchars($_GET['nPermission']);


            $guest_id = $pdo->prepare("SELECT * FROM guest_users WHERE guest_name=?");
            $guest_id->execute(array($userGuest_name));
            $getGuest_id = $guest_id->fetch();

            $verify_pass = $pdo->prepare("SELECT password FROM super_user WHERE password=?");
            $verify_pass->execute(array($superUser_pass));

            $pass_exist = $verify_pass->rowCount();

            if($pass_exist == 1)
            {

                $update_rights = $pdo->prepare("UPDATE guest_rights SET updating_right=?, deleting_right=?, uploading_right=?, need_permission=? WHERE guestUser_id=?");
                $update_rights->execute(array($update, $delete, $upload, $nPermission, $getGuest_id['id']));


                send_mail(

                    "Your administrator rights are changed",
                    "The super administrator has to change some of your right.<br/> You can or more do certain thing",
                    "Team Avengers",
                    "teamavengers@gmail.com",
                    $getGuest_id['guest_email']

                );

                echo "Guesr user rights is changed...";

            }else{

                echo "Wrong password...";

            }

    }

    changeRigths();

 ?>
