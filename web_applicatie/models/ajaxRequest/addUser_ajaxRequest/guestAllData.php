<?php

    require "../pdo_connection.php";

    function guestAllData()
    {

       $pdo = pdo();
       $guest_name = htmlspecialchars($_GET['guestName']);

       $selectGuestData = $pdo->prepare("SELECT*FROM guest_users WHERE guest_name=?");
       $selectGuestData->execute(array($guest_name));

       $displayGuestData = $selectGuestData->fetch();

       $selectGuestRights = $pdo->prepare("SELECT*FROM guest_rights WHERE guestuser_id=?");
       $selectGuestRights->execute(array($displayGuestData['id']));
       $display_rights = $selectGuestRights->fetch();

       $guest_status = "Yes";

       if($displayGuestData['active'] == 1)
       {

          $guest_status = "Yes";

       }else if($displayGuestData['active'] == 2){

          $guest_status = "No";

       }

       ?>

           <div class="guestDataContainer">

               <p class="guestPersonal">Name: <?php echo $displayGuestData['guest_name'];?></p>
               <p class="guestPersonal">Username: <?php echo $displayGuestData['guest_username'];?></p>
               <p class="guestPersonal">Email: <?php echo $displayGuestData['guest_email'];?></p>
               <p class="guestPersonal">Department: <?php echo $displayGuestData['category'];?></p>
               <p class="guestPersonal">Status: <?php echo $guest_status;?></p>

           </div>

           <div class="guestRightsContainer">

               <p class="guestRights">Can Update: <?php echo $display_rights['updating_right'];?></p>
               <p class="guestRights">Can Upload: <?php echo $display_rights['uploading_right'];?></p>
               <p class="guestRights">Can Delete: <?php echo $display_rights['deleting_right'];?></p>
               <p class="guestRights">Need Permission: <?php echo $display_rights['need_permission'];?></p>

           </div>

       <?php

    }

    guestAllData();

 ?>
