<?php

      session_start();

         require "../bemika_cms/web_applicatie/models/settings_model.php";

         $settings = new settings();

         if(isset($_GET['id']) AND htmlspecialchars($_GET['id']) != "" AND htmlspecialchars($_GET['id']) > 0 AND isset($_GET['user']) AND htmlspecialchars($_GET['user']) != "")
         {

              $userID = intval(htmlspecialchars($_GET['id']));
              $userGrade = htmlspecialchars($_GET['user']);
              $bemikaPage = htmlspecialchars($_GET['bemika']);

              $userData = $settings->userAcces_data($userID);


              if($_SESSION['id'] == $userData['id'])
              {

                    if($userGrade == "super_user")
                    {

                       require "../bemika_cms/web_applicatie/vieuws/bemikaCms_pages/settings.php";

                       $settings->superUserPersonal_data($userID);


                    }else if($userGrade == "guest_users"){

                      require "../bemika_cms/web_applicatie/vieuws/bemikaCms_pages/settings.php";

                      $settings->guestUserPersonal_data($userID);


                    }else if($bemikaPage == "addUsers" && $userGrade == "guest_users"){

                         echo "You kan acces this page because you are not a superuser";

                    }



              }else{

                 header("Location: ../bemika_cms/bemika.php?bemika=login");


              }

         }else{

            echo "ID don't exist";

         }

 ?>
