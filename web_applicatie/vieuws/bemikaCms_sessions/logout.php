<?php

   session_start();
   $_SESSION = array();
   session_destroy();
   header("Location:../bemika_cms/bemika.php?bemika=login");

 ?>
