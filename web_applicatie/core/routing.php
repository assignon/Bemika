<?php


   require "../bemika_cms/web_applicatie/controllers/routeController.php";

   class route
   {

           public function __construct()
           {

               $this->routing();

           }


           public function routing()
           {

                    $path_controller = new path_controller();

                    if(isset($_GET["bemika"]) AND $_GET["bemika"] == "")
                    {

                            $pathName = htmlspecialchars($_GET["bemika"]);


                          }
                          else if($_GET["bemika"] == "login")
                            {

                                $path_controller->login_page();

                            }else if($_GET["bemika"] == "dashboard")
                              {

                                  $path_controller->dashboard();

                              }else if($_GET["bemika"] == "addUsers")
                                {

                                    $path_controller->addUsers();

                                }else if($_GET["bemika"] == "tasks")
                                  {

                                      $path_controller->tasks();

                                  }else if($_GET["bemika"] == "logout")
                                    {

                                        $path_controller->logout();

                                    }else if($_GET["bemika"] == "settings")
                                      {
  
                                          $path_controller->settings();

                                      }


                            else
                            {

                                $path_controller->login_page();
                              //echo "don't exist";

                            }

                    }

           }


 ?>
