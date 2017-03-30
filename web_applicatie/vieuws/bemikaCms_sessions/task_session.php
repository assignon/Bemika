<?php
  session_start();

     require "../bemika_cms/web_applicatie/models/task_model.php";

     $task = new tasks();

     if(isset($_GET['id']) AND htmlspecialchars($_GET['id']) != "" AND htmlspecialchars($_GET['id']) > 0)
     {

          $userID = intval(htmlspecialchars($_GET['id']));

          $userData = $task->userAcces_data($userID);


          if($_SESSION['id'] == $userData['id'])
          {

              require "../bemika_cms/web_applicatie/vieuws/bemikaCms_pages/task.php";

          }else{

              header("Location: ../bemika_cms/bemika.php?bemika=login");

          }

     }else{

        echo "ID don't exist";

     }

 ?>
