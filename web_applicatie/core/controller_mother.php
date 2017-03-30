<?php


     class controllers_mother
     {

           function __construct()
           {

               require "vieuw_mother.php";

           }


           protected function vieuw_extence()
           {

               $vieuw = new vieuwsMother();
               return $vieuw;

           }
     }


 ?>
