<?php
  session_start();

     require "../bemika_cms/web_applicatie/models/addUsers_model.php";

     $add_users = new add_users();

     if(isset($_GET['id']) AND htmlspecialchars($_GET['id']) != "" AND htmlspecialchars($_GET['id']) > 0)
     {

          $userID = intval(htmlspecialchars($_GET['id']));

          $userData = $add_users->userAcces_data($userID);
          //$add_users->rightStyle();
          $add_users->changeRights();
          $add_users->addGuest_user();
          $add_users->displayAll_categories();
          //$add_users->checkGuest_userStatus();
          //$add_users->active_inactive();

          if($_SESSION['id'] == $userData['id'])
          {

              require "../bemika_cms/web_applicatie/vieuws/bemikaCms_pages/addUsers.php";


          }else if(htmlspecialchars($_GET['bemika']) != "super_user"){

               echo "You can't acces this page because you are not a super user";

          }
          else{

             header("Location: ../bemika_cms/bemika.php?bemika=login");

          }

     }else{

        echo "ID don't exist";

     }

 ?>
