<?php
      session_start();
      require "../bemika_cms/web_applicatie/core/model_mother.php";

      class login_model extends modelsMother
      {

            public function __construct()
            {

                parent::__construct();

            }


            public function login()
            {



                if(isset($_POST['login']))
                {

                    $superUser = htmlspecialchars($_POST['superUser']);
                    $pass = sha1($_POST['password']);

                    if(!empty($superUser) AND !empty($pass))
                    {

                        $select = $this->prepare("SELECT*FROM super_guest_users WHERE username=?", array($superUser));
                        $superUserCount = $select->rowCount();


                        if($superUserCount == 1)
                        {
                            $select_pass = $this->prepare_fetch("SELECT*FROM super_guest_users WHERE password=?", array($pass));


                            if($pass == $select_pass['password'])
                            {

                                $select_all = $this->prepare("SELECT*FROM super_guest_users WHERE username=? AND password=?", array($superUser, $pass));
                                $selectAll_count = $select_all->rowCount();


                                if($selectAll_count == 1)
                                {
                                    $select_all_fetch = $select_all->fetch();

                                    $_SESSION['id'] = $select_all_fetch['id'];
                                    $_SESSION['username'] = $select_all_fetch['username'];
                                    $_SESSION['password'] = $select_all_fetch['password'];
                                    header("Location: ../bemika_cms/bemika.php?bemika=settings&id=".$_SESSION['id']."&user=".$select_all_fetch['grade']);


                                }

                            }else{

                               $this->error('Wrong password', 'loginError', '#F91535');

                            }

                        }else{

                            $this->error('Wrong username', 'loginError', '#F91535');

                        }


                    }else{

                         $this->error('Fill all fields', 'loginError', '#F91535');

                    }

                }

            }



            public function guest_login()
            {

                if(isset($_POST['guestLogin']))
                {

                    $guestUser = htmlspecialchars($_POST['guestUser']);
                    $pass = sha1($_POST['guestPassword']);

                    if(!empty($guestUser) AND !empty($pass))
                    {

                        $select = $this->prepare("SELECT*FROM guest_users WHERE guest_username=?", array($guestUser));
                        $guestUserCount = $select->rowCount();


                        if($guestUserCount == 1)
                        {

                            $select_pass = $this->prepare_fetch("SELECT*FROM guest_users WHERE guest_password=?", array($pass));

                            if($pass == $select_pass['guest_password'])
                            {

                                $select_all = $this->prepare("SELECT*FROM guest_users WHERE guest_username=? AND guest_password=?", array($guestUser, $pass));
                                $selectAll_count = $select_all->rowCount();

                                if($selectAll_count == 1)
                                {
                                    $select_all_fetch = $select_all->fetch();

                                    $_SESSION['id'] = $select_all_fetch['id'];
                                    $_SESSION['guest_username'] = $select_all_fetch['guest_username'];
                                    $_SESSION['guest_password'] = $select_all_fetch['guest_password'];
                                    header("Location: ../bemika_cms/bemika.php?bemika=settings&id=".$_SESSION['id']."&user=guest_users");

                                }



                            }else{

                               $this->error('Wrong password', 'loginError', '#F91535');

                            }

                        }else{

                            $this->error('Wrong username', 'loginError', '#F91535');

                        }


                    }else{

                         $this->error('Fill all fields', 'loginError', '#F91535');

                    }

                }

            }



            public function customize_loginPage()
            {

                ?>

                    <script type="text/javascript">

                         window.addEventListener("load", function(){

                               var changePass = document.getElementById("changePass");
                               var updateBgSub = document.getElementById("updateBgSub");
                               var updateAvatarSub = document.getElementById("updateAvatarSub");
                               var xhr;


                               if(window.XMLHttpRequest){

                                  xhr = new XMLHttpRequest();

                               }else{

                                  xhr = new ActiveXobject("Microsoft.XMLHTTP");

                               }


                              changePass.addEventListener("click", function(e){

                                  e.preventDefault();
                                  var changePassError = document.getElementById("changePassError");
                                  var userEmail_val = document.getElementById("userEmail").value;



                                  xhr.onreadystatechange = function() {

                                              if(this.readyState == 4 && this.status == 200){

                                                  changePassError.innerHTML = xhr.responseText;

                                              }

                                        }


                                        if(userEmail_val != "")
                                        {

                                            xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/login_ajaxRequest/change_passe.php?data='+userEmail_val,true);
                                            xhr.send();

                                        }else{

                                             changePassError.innerHTML = "Gives your current username of email...";

                                        }


                              })



                              updateBgSub.addEventListener("click", function(e){

                                    e.preventDefault();
                                    var updateBgError = document.getElementById("updateBgError");
                                    var updateBg_val = document.getElementById("updateBg").files[0];
                                    var bgImage_passe_val = document.getElementById("bgImage_passe").value;

                                    //alert(updateBg_val.name);
                                    var formData = new FormData();
                                    formData.append('updateBg', updateBg_val);

                                    xhr.onreadystatechange = function() {

                                                if(this.readyState == 4 && this.status == 200){

                                                    updateBgError.innerHTML = xhr.responseText;
                                                    displayBG();

                                                }

                                          }

                                          if(updateBg_val != "" && bgImage_passe_val != "")
                                          {

                                             xhr.open('POST','../bemika_cms/web_applicatie/models/ajaxRequest/login_ajaxRequest/change_bgImage.php?pass='+bgImage_passe_val,true);
                                             xhr.send(formData);

                                          }else{

                                             updateBgError.innerHTML = "Choose an image and enter your current password...";

                                          }

                              })




                             function displayBG()
                             {

                                 var bgImage_passe_val = document.getElementById("bgImage_passe").value;
                                 var body = document.getElementById("body");

                                 xhr.onreadystatechange = function() {

                                             if(this.readyState == 4 && this.status == 200){

                                                  var bg = xhr.responseText;
                                                  body.style.backgroundImage = "url('"+bg+"')";

                                                  //alert(bg);

                                             }

                                       }



                                          xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/login_ajaxRequest/display_bgImage.php?pass='+bgImage_passe_val,true);
                                          xhr.send();



                             }
                          //   displayBG();




                            /*  updateAvatarSub.addEventListener("click", function(e){

                                  e.preventDefault();
                                  var updateAvatarError = document.getElementById("updateAvatarError");
                                  var updateAvatar_val = document.getElementById("updateAvatar").files[0];
                                  var avatar_passe_val = document.getElementById("avatar_passe").value;


                                  var formData = new FormData();
                                  formData.append('updateAvatar', updateAvatar_val)

                                  xhr.onreadystatechange = function() {

                                              if(this.readyState == 4 && this.status == 200){

                                                  updateAvatarError.innerHTML = xhr.responseText;
                                                  displayAvatar();

                                              }

                                        }

                                        xhr.open('POST','../bemika_cms/web_applicatie/models/ajaxRequest/login_ajaxRequest/change_avatar.php?pass='+avatar_passe_val,true);
                                        xhr.send(formData);

                              })*/




                              function displayAvatar()
                              {

                                  var avatar_passe_val = document.getElementById("avatar_passe").value;
                                  var logo = document.getElementById("logo");

                                  xhr.onreadystatechange = function() {

                                              if(this.readyState == 4 && this.status == 200){

                                                   var avatar = xhr.responseText;
                                                   logo.style.backgroundImage = "url('"+avatar+"')";
                                                   //alert(bg);

                                              }

                                        }



                                           xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/login_ajaxRequest/display_avatar.php?pass='+avatar_passe_val,true);
                                           xhr.send();



                              }
                            //  displayAvatar();


                         })

                    </script>

                <?php

            }



            public function displayBG()
            {


                $select = $this->PDO()->query('SELECT*FROM super_user');
                //$select->execute(array($password));
                $display = $select->fetch();

                //echo "../../../../../bemika_cms/media/login_uploaded_images/".$display['background'];


                ?>

                   <script type="text/javascript">

                       window.addEventListener("load", function(){

                          var body = document.getElementById("body");
                          body.style.backgroundImage = "url('../bemika_cms/public/media/login_uploaded_images/<?php echo $display['background'];?>')";

                       })

                   </script>

                <?php

            }

      }


 ?>
