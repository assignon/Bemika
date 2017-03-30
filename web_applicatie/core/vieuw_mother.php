<?php

     class vieuwsMother
     {

             public function __construct()
             {



             }


             public function render($page_path)
             {

                require $page_path.".php";

             }


     }

 ?>
