<?php

    require "../bemika_cms/web_applicatie/core/controller_mother.php";

    class path_controller extends controllers_mother
    {

         public function __construct()
         {

              parent::__construct();

         }


          public function login_page()
          {

              $login_page = $this->vieuw_extence();
              $login_page->render("../bemika_cms/web_applicatie/vieuws/bemikaCms_sessions/login_session");

          }


          public function dashboard()
          {

            $dashboard_page = $this->vieuw_extence();
            $dashboard_page->render("../bemika_cms/web_applicatie/vieuws/bemikaCms_sessions/dashboard_session");


          }



          public function addUsers()
          {

            $dashboard_page = $this->vieuw_extence();
            $dashboard_page->render("../bemika_cms/web_applicatie/vieuws/bemikaCms_sessions/addUsers_session");


          }


          public function tasks()
          {

            $dashboard_page = $this->vieuw_extence();
            $dashboard_page->render("../bemika_cms/web_applicatie/vieuws/bemikaCms_sessions/task_session");


          }


          public function logout()
          {

            $dashboard_page = $this->vieuw_extence();
            $dashboard_page->render("../bemika_cms/web_applicatie/vieuws/bemikaCms_sessions/logout");


          }


          public function settings()
          {

            $dashboard_page = $this->vieuw_extence();
            $dashboard_page->render("../bemika_cms/web_applicatie/vieuws/bemikaCms_sessions/settings");


          }


    }

 ?>
