<?php

    require "../pdo_connection.php";
    require "../sendMail.php";

    function deleteGuest_user()
    {

        $pdo = pdo();

        $guest_name = htmlspecialchars($_GET['targetName']);
        $deletePassVal = sha1($_GET['deletePassVal']);

        $select = $pdo->prepare("SELECT*FROM guest_users WHERE guest_name=?");
        $select->execute(array($guest_name));

        $guest_id = $select->fetch();

        $selectGuest = $pdo->prepare("SELECT*FROM super_guest_users WHERE username=?");
        $selectGuest->execute(array($guest_name));

        $guestUser_id = $selectGuest->fetch();

        $check_pass = $pdo->prepare("SELECT * FROM super_user WHERE password=?");
        $check_pass->execute(array($deletePassVal));

        $check_passCount = $check_pass->rowCount();

        if($check_passCount == 1)
        {

              $delete = $pdo->prepare("DELETE FROM guest_users WHERE id=?");
              $delete->execute(array($guest_id['id']));

              $deleteGuest = $pdo->prepare("DELETE FROM super_guest_users WHERE id=?");
              $deleteGuest->execute(array($guestUser_id['id']));


              $deleteRights = $pdo->prepare("DELETE FROM guest_rights WHERE guestUser_id=?");
              $deleteRights->execute(array($guest_id['id']));

              send_mail(

                  "Your administrator account has been deleted",
                  "Sorry but your account has been deleted. Which means you lost your administrator rights",
                  "Team Avengers",
                  "teamavengers@gmail.com",
                  $guest_id['guest_email']

              );

              echo "The guest user is succesful delete. An email was sent to him to inform him.";

        }else{

            echo "Wrong password...";

        }

    }

    deleteGuest_user();

 ?>
