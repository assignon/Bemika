<?php

        require "../pdo_connection.php";

        function displayUsers()
        {

            $pdo = pdo();

            $select = $pdo->query("SELECT*FROM guest_users");
            //$select->execute(array(1));


            while($display = $select->fetch())
            {

                ?>

                  <div class="usersContainer">

                          <div class="avatarStatus">

                           <img src="../bemika_cms/public/media/uploadedAvatar/<?php echo $display['guest_avatar'];?>" alt="" class="useresAvatar">
                           <div class="usersStatus" style=" background-color: <?php echo $display['status_color'];?>;"></div>

                        </div>

                        <p class="usersName"><?php echo $display['guest_name'];?></p>


                    </div>




                <?php

            }

        }

        displayUsers();

 ?>
