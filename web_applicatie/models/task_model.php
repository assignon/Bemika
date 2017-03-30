<?php

require "../bemika_cms/web_applicatie/core/model_mother.php";

class tasks extends modelsMother
{

       public function __construct()
       {

           parent::__construct();

       }


       public function userAcces_data($id)
       {

           $selectUser_data = $this->prepare_fetch("SELECT*FROM guest_users WHERE id=?", array($id));
           return $selectUser_data;

       }

  }

 ?>
