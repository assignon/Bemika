<?php

      require "../bemika_cms/web_applicatie/core/model_mother.php";

      class settings extends modelsMother
      {

               public function __construct()
               {

                   parent::__construct();

               }


               public function userAcces_data($id)
               {

                   $selectUser = $this->prepare("SELECT*FROM super_guest_users WHERE id=?", array($id));
                   $selectUser_data = $selectUser->fetch();

                    return $selectUser_data;

               }



               public function superUserPersonal_data($id)
               {

                   $select = $this->prepare_fetch("SELECT*FROM super_user WHERE id=?", array($id));
                   ?>

                        <script type="text/javascript">

                           window.addEventListener("load", function(){

                               var inputsNames = document.querySelectorAll(".data");
                               var inputValues = document.querySelectorAll(".inputValues");
                               var guestAvatar = document.getElementById("guestAvatar");
                               var currentPass = document.getElementById("currentPass");
                               var updateUserData = document.getElementById("updateUserData");
                               var userUpdateError = document.getElementById("userUpdateError");

                               var xhr;

                               inputsNames[0].innerHTML += "   <?php echo ucfirst($select['super_user']);?>";
                               inputsNames[1].innerHTML += "   <?php echo $select['email'];?>";
                               inputsNames[2].innerHTML += "   All department";


                              /* inputValues[0].value = "<?php echo $select['super_user'];?>";
                               inputValues[1].value = "<?php echo $select['email'];?>";*/
                                guestAvatar.src = "../bemika_cms/public/media/uploadedAvatar/<?php echo $select['avatar'];?>";


                                if(window.XMLHttpRequest){

                                   xhr = new XMLHttpRequest();

                                }else{

                                   xhr = new ActiveXobject("Microsoft.XMLHTTP");

                                }


                                function updateSuperUser_data()
                                {

                                    updateUserData.addEventListener("click", function(e){

                                       e.preventDefault();
                                       var username = inputValues[0].value;
                                       var email = inputValues[1].value;
                                       var newPass = inputValues[2].value;
                                       var current_pass = currentPass.value;

                                       var userAvatarFile = document.getElementById("usersAvatar").files[0];
                                       var formData = new FormData();
                                       formData.append('usersAvatar', userAvatarFile)

                                       xhr.onreadystatechange = function() {

                                                  if(this.readyState == 4 && this.status == 200){

                                                     userUpdateError.innerHTML = xhr.responseText;


                                                 }

                                       }

                                       if(username != "" || email != "" || newPass != "" || userAvatarFile != "" && current_pass != "")
                                        {

                                               xhr.open('POST','../bemika_cms/web_applicatie/models/ajaxRequest/update_ajaxRequest/updateSuperUserData.php?username='+username+'&email='+email+'&newPass='+newPass+'&current_pass='+current_pass,true);
                                               xhr.send(formData);

                                         }else{

                                               userUpdateError.innerHTML = "The fields are required en enter your current password";

                                          }


                                    })

                                }
                                updateSuperUser_data()


                           })

                        </script>

                   <?php

               }



               public function guestUserPersonal_data($id)
               {

                   $select = $this->prepare_fetch("SELECT*FROM guest_users WHERE guest_id=?", array($id));
                   ?>

                        <script type="text/javascript">

                           window.addEventListener("load", function(){

                               var inputsNames = document.querySelectorAll(".data");
                               var inputValues = document.querySelectorAll(".inputValues");
                               var guestAvatar = document.getElementById("guestAvatar");
                               var currentPass = document.getElementById("currentPass");
                               var updateUserData = document.getElementById("updateUserData");
                               var userUpdateError = document.getElementById("userUpdateError");

                               var xhr;

                               inputsNames[0].innerHTML += "  <?php echo $select['guest_name'];?>";
                               inputsNames[1].innerHTML += "  <?php echo $select['guest_email'];?>";
                               inputsNames[2].innerHTML += "  <?php echo ucfirst($select['category']);?>";

                            /*   inputValues[0] = "<?php echo $select['guest_username'];?>";
                               inputValues[1] = "<?php echo $select['email'];?>";**/
                               guestAvatar.src = "../bemika_cms/public/media/uploadedAvatar/<?php echo $select['guest_avatar'];?>";


                               if(window.XMLHttpRequest){

                                  xhr = new XMLHttpRequest();

                               }else{

                                  xhr = new ActiveXobject("Microsoft.XMLHTTP");

                               }


                               function updateGuestUser_data()
                               {

                                   updateUserData.addEventListener("click", function(e){

                                      e.preventDefault();
                                      var username = inputValues[0].value;
                                      var email = inputValues[1].value;
                                      var newPass = inputValues[2].value;
                                      var current_pass = currentPass.value;

                                      var userAvatarFile = document.getElementById("usersAvatar").files[0];
                                      var formData = new FormData();
                                      formData.append('usersAvatar', userAvatarFile)

                                      xhr.onreadystatechange = function() {

                                                 if(this.readyState == 4 && this.status == 200){

                                                    userUpdateError.innerHTML = xhr.responseText;


                                                }

                                      }

                                      if(username != "" || email != "" || newPass != "" || userAvatarFile != "" && current_pass != "")
                                       {

                                              xhr.open('POST','../bemika_cms/web_applicatie/models/ajaxRequest/update_ajaxRequest/updateGuestUserData.php?username='+username+'&email='+email+'&newPass='+newPass+'&current_pass='+current_pass,true);
                                              xhr.send(formData);

                                        }else{

                                              userUpdateError.innerHTML = "The fields are required en enter your current password";

                                         }


                                   })

                               }
                               updateGuestUser_data()



                           })

                        </script>

                   <?php

               }



      }

 ?>
