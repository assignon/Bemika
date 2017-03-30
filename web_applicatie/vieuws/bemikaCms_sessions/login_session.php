<?php

     require "../bemika_cms/web_applicatie/models/login_model.php";

     $login = new login_model();
     $login->login();
     //$login->guest_login();
     //$login->customize_loginPage();
     //$login->displayBG();

     require "../bemika_cms/web_applicatie/vieuws/bemikaCms_pages/login.php";

 ?>
