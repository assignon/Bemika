<?php

      require "../pdo_connection.php";

      function displayRights()
      {

          $pdo = pdo();

          $userGuest_name = htmlspecialchars($_GET['userGuest_name']);

          $getUser_id = $pdo->prepare("SELECT id FROM guest_users WHERE guest_name=?");
          $getUser_id->execute(array($userGuest_name));
          $userId = $getUser_id->fetch();

          $selectRights = $pdo->prepare("SELECT * FROM guest_rights WHERE guestUser_id=?");
          $selectRights->execute(array($userId['id']));

          $displayRights = $selectRights->fetch();

          ?>

                <div class="rightsContainer">

                  <div class="guestRightsCont">

                      <span class="icon-spinner11"></span>
                      <p class="change_rulesType">Upload</p>
                      <p class="rights_status"><?php echo $displayRights['updating_right'];?></p>

                  </div>


                  <div class="guestRightsCont">

                      <span class="icon-bin"></span>
                      <p class="change_rulesType">Delete</p>
                      <p class="rights_status"><?php echo $displayRights['deleting_right'];?></p>

                  </div>


                  <div class="guestRightsCont">

                      <span class="icon-upload"></span>
                      <p class="change_rulesType">Upload</p>
                      <p class="rights_status"><?php echo $displayRights['uploading_right'];?></p>

                  </div>


                  <div class="guestRightsCont">

                      <span class="icon-key2"></span>
                      <p class="change_rulesType">Need permission</p>
                      <p class="rights_status"></p>

                  </div>


                </div>


                <style type="text/css">

                     .rightsContainer
                     {

                        display: flex;
                        flex-direction: row;
                        justify-content: center;
                        align-items: center;

                     }

                      .guestRightsCont
                      {

                         display: flex;
                         flex-direction: column;
                         justify-content: center;
                         align-items:center ;
                         width: auto;
                         height: auto;
                         margin-left: 15px;
                         margin-right: 15px;


                      }


                      .change_rulesType
                      {

                         width: auto;
                         height: auto;
                         font-size: 18px;
                         text-align: center;
                         cursor: pointer;
                         margin-top: -1px;
                         color: white


                      }


                      .rights_status
                      {

                         margin-top: -5px;
                         color: white;

                      }



                      .guestRightsCont span
                      {

                          text-align: right;
                          font-size: 23px;
                          border: 2px solid white;
                          color: white;
                          border-radius: 100%;
                          padding: 16px;
                          cursor: pointer;


                      }


                </style>

          <?php


      }

      displayRights();

 ?>
