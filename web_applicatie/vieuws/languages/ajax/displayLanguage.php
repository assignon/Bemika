<?php

    require "bd_connection.php";


    function displayLangs()
    {

         $pdo = pdo();

         $select = $pdo->query("SELECT*FROM languages");

         while($display = $select->fetch())
         {

               ?>

                  <div class="newLangsContainer">

                      <img src="ajax/lang_icons/<?php echo $display['languages_icon'];?>" alt="" class="newLangs">
                      <p class="newLangsName"><?php echo $display['languages_name'];?></p>

                  </div>

               <?php

         }

    }

    displayLangs();

 ?>
