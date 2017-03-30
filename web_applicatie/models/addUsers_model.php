<?php

     require "../bemika_cms/web_applicatie/core/model_mother.php";

     class add_users extends modelsMother
     {

          public function __construct()
          {

              parent::__construct();

          }


          public function userAcces_data($id)
          {

              $selectUser_data = $this->prepare_fetch("SELECT*FROM super_user WHERE id=?", array($id));
              return $selectUser_data;

          }




     public function rightStyle()
     {

         $select = $this->PDO()->query("SELECT*FROM  guestRights_style");
         $getData = $select->fetch();

         $need_permission = $this->prepare("SELECT*FROM  guestRights_style WHERE right_name=?", array("need_permission"));
         $need_permissionData = $need_permission->fetch();


         ?>

              <script type="text/javascript">

                 window.addEventListener("load", function(){

                    var rightsButt = document.querySelectorAll(".rightsButt span");


                    for (var i = 0; i < rightsButt.length; i++) {

                        var rightsButtArr = rightsButt[i];
                        //var icon = rightsButtArr.childNodes[1];

                        rightsButtArr.style.backgroundColor = "<?php echo $getData['background_color'];?>";
                        rightsButtArr.style.border = "2px solid <?php echo $getData['border'];?>";
                        rightsButtArr.style.color = "<?php echo $getData['color'];?>";

                    }

                    rightsButt[3].style.backgroundColor = "<?php echo $need_permissionData['background_color'];?>";
                    rightsButt[3].style.border = "2px solid <?php echo $need_permissionData['border'];?>";
                    rightsButt[3].style.color = "<?php echo $need_permissionData['color'];?>";



                 })

              </script>

         <?php

     }


     public function changeRights()
     {

        ?>

            <script type="text/javascript">

                window.addEventListener("load", function(){

                        var rightsButt = document.querySelectorAll(".rightsButt");
                        var status = document.querySelectorAll('.status');
                        var xhr;

                        if(window.XMLHttpRequest){

                           xhr = new XMLHttpRequest();

                        }else{

                           xhr = new ActiveXobject("Microsoft.XMLHTTP");

                        }


                        for (var i = 0; i < rightsButt.length; i++) {

                            var rightsButtArr = rightsButt[i];

                            rightsButtArr.addEventListener("click", function(e){



                                 var target = e.target.parentNode.childNodes[5].textContent;
                                 var targetStatus = e.target.parentNode.childNodes[5];

                                 var icons = e.target.parentNode.childNodes[1].style;

                                 if(target == "(No)")
                                 {

                                      targetStatus.innerHTML = "(Yes)";
                                      targetStatus.style.color = "green";

                                      icons.color = "white";
                                      icons.backgroundColor = "#32323A";



                                 }else if(target == "(Yes)"){

                                     targetStatus.innerHTML = "(No)";
                                     targetStatus.style.color = "red";

                                     icons.color = "#32323A";
                                     icons.backgroundColor = "white";



                                 }

                                 var permissionIcon = status[3].parentNode.childNodes[1].style;
                                 //alert(permissionIcon);


                                 if(status[0].textContent == "(No)" && status[1].textContent == "(No)" && status[2].textContent == "(No)")
                                   {

                                      status[3].innerHTML = "(Yes)";
                                      status[3].style.color = "green";

                                      permissionIcon.color = "white";
                                      permissionIcon.backgroundColor = "#32323A";

                                 }else if(status[0].textContent == "(Yes)" || status[1].textContent == "(Yes)" || status[2].textContent == "(Yes)")
                                 {

                                      status[3].innerHTML = "(No)";
                                      status[3].style.color = "red";

                                      permissionIcon.color = "#32323A";
                                      permissionIcon.backgroundColor = "white";

                                 }

                            })



                        }


                })

            </script>

        <?php

     }


     public function addGuest_user()
     {


       $statusColor = $this->PDO()->query("SELECT status_color FROM guest_users");


        ?>

             <script type="text/javascript">

                window.addEventListener("load", function(){

                      var displayExplain = document.getElementById("displayExplain");
                      var newUserData = document.querySelectorAll(".newUserData");
                      var categoryValue = document.getElementById("categoryValue");
                      var rightsButt = document.querySelectorAll(".rightsButt");
                      var addNewUser = document.getElementById("addNewUser");
                      var xhr;

                      if(window.XMLHttpRequest){

                         xhr = new XMLHttpRequest();

                      }else{

                         xhr = new ActiveXobject("Microsoft.XMLHTTP");

                      }

                      addNewUser.addEventListener("click", function(e){

                          e.preventDefault();
                          var name = newUserData[0].value;
                          var email = newUserData[1].value;
                          var category = newUserData[2].options[newUserData[2].selectedIndex].value;
                          //alert(category);

                          var updateVal = rightsButt[0].childNodes[5].textContent;
                          var deleteVal = rightsButt[1].childNodes[5].textContent;
                          var uploadVal = rightsButt[2].childNodes[5].textContent;
                          var nPermission = rightsButt[3].childNodes[5].textContent;
                        //  alert(updateVal+deleteVal+uploadVal);

                          xhr.onreadystatechange = function() {

                                      if(this.readyState == 4 && this.status == 200){

                                          displayExplain.innerHTML = xhr.responseText;
                                          displayUsers();


                                      }

                                }

                                if(name != "")
                                {

                                      if(email != "")
                                      {

                                           if(category != "")
                                           {

                                             xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/addGuestUser.php?name='+name+'&email='+email+'&category='+category+'&updateVal='+updateVal+'&deleteVal='+deleteVal+'&uploadVal='+uploadVal+'&nPermission='+nPermission,true);
                                             xhr.send();

                                           }else{

                                               displayExplain.innerHTML = "Choose a category please";

                                           }

                                      }else{

                                          displayExplain.innerHTML = "Gives a email please";

                                      }

                                }else{

                                    displayExplain.innerHTML = "Gives a name please";

                                }

                      })



                      function newCategory()
                      {

                          var categoryValue = document.getElementById("categoryValue");
                          var newCategory = document.getElementById("newCategory");
                          var displayExplain = document.getElementById("displayExplain");

                          newCategory.addEventListener("click", function(e){

                             e.preventDefault();

                             var categoryVal = categoryValue.value;

                             xhr.onreadystatechange = function() {

                                         if(this.readyState == 4 && this.status == 200){

                                             displayExplain.innerHTML = xhr.responseText;

                                             display_category();

                                         }

                                   }

                                   if(categoryVal != "")
                                   {

                                     xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/addNewCatagory.php?categoryVal='+categoryVal,true);
                                     xhr.send();

                                   }else{

                                       displayExplain.innerHTML = "Gives a name to the new category";

                                   }


                          })

                      }

                      newCategory();


                      function display_category()
                      {

                               var catagory = document.getElementById("catagory");
                               var categoryValue = document.getElementById("categoryValue");
                                var newCategory = document.getElementById("newCategory");

                             var categoryVal = categoryValue.value;

                                xhr.onreadystatechange = function() {

                                            if(this.readyState == 4 && this.status == 200){

                                                catagory.innerHTML += xhr.responseText;

                                            }

                                      }


                                        xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/displayCatagory.php?categoryVal='+categoryVal,true);
                                        xhr.send();


                      }
                      display_category();




                      function displayUsers()
                      {

                           var guestUserContainer = document.getElementById("guestUserContainer");

                            xhr.onreadystatechange = function() {

                                        if(this.readyState == 4 && this.status == 200){

                                            guestUserContainer.innerHTML = xhr.responseText;

                                            display_usersRights();
                                            deleteGuestUser();


                                        }

                                  }


                                    xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/displayUsers.php?',true);
                                    xhr.send();

                          }
                          displayUsers();




                          function guestUser_data(userGuest_name)
                          {

                              var avatarStatus = document.querySelectorAll(".avatarStatus");
                              var usersOption = document.getElementById("usersOption");
                              var currentGuestName = document.getElementById("currentGuestName");
                              var superUser = document.getElementById("superUser");


                                        currentGuestName.innerHTML = 'Guest Name: '+userGuest_name;


                                        $(function(){

                                            $(usersOption).animate({

                                                bottom: 688,


                                            },{

                                                duration: 700,
                                                easing: "easeOutBack",

                                            })



                                        })


                          }



                          function getAll_userData(userGuest_nameObj)
                          {

                              var avatarStatus = document.querySelectorAll(".avatarStatus");
                              var guestDataRights = document.getElementById("guestDataRights");
                              var userGuest_name = userGuest_nameObj.textContent;


                                   xhr.onreadystatechange = function() {

                                          if(this.readyState == 4 && this.status == 200){

                                              guestDataRights.innerHTML = xhr.responseText;

                                            }

                                         }


                                     xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/guestAllData.php?guestName='+userGuest_name,true);
                                     xhr.send();


                          }



                        function deleteGuestUser()
                        {

                           var avatarStatus = document.querySelectorAll(".avatarStatus");

                            for (var i = 0; i < avatarStatus.length; i++) {

                                 var avatarStatusArr = avatarStatus[i];

                                 avatarStatusArr.addEventListener("click", function(e){

                                     var guestUser = e.target.parentNode.parentNode;

                                      var targetName = e.target.parentNode.parentNode.childNodes[3].textContent;

                                      var deleteCheck_error = document.getElementById("deleteCheck_error");
                                      var deletePass = document.getElementById("deletePass");
                                      var delete_user = document.getElementById("delete_user");

                                      delete_user.addEventListener("click", function(e){

                                         e.preventDefault();
                                         var deletePassVal = deletePass.value;


                                           xhr.onreadystatechange = function() {

                                                     if(this.readyState == 4 && this.status == 200){

                                                         deleteCheck_error.innerHTML = xhr.responseText;

                                                         if(deleteCheck_error.textContent == "The guest user is succesful delete. An email was sent to him to inform him.")
                                                         {

                                                             deletePassVal = "";
                                                             deleteCheck_error.innerHTML = "are you sure you want to delete this user? Gives the password to delete it";

                                                         }

                                                         if(deleteCheck_error.innerHTML != "Wrong password...")
                                                         {

                                                             $(function(){

                                                                $(guestUser).toggle( "explode" );

                                                             })

                                                         }



                                                     }

                                               }


                                                 if(deletePassVal != "")
                                                 {

                                                   xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/deleteGuestUser.php?deletePassVal='+deletePassVal+'&targetName='+targetName,true);
                                                   xhr.send();


                                                 }else{

                                                    deleteCheck_error.innerHTML = "Enter your password";

                                                 }


                                         })


                                    })



                              }

                        }




                        function inactiveStatus()
                        {

                           var activeStatus = document.getElementById("activeStatus");

                           var avatarStatus = document.querySelectorAll(".avatarStatus");


                           for (var i = 0; i < avatarStatus.length; i++) {

                               var avatarStatusArr = avatarStatus[i];


                               avatarStatusArr.addEventListener("click", function(e){


                                   var currentUser = e.target.parentNode.parentNode.childNodes[3];

                                   var userStatus = e.target.parentNode.parentNode.childNodes[1].childNodes[3];
                                   var guest_name = e.target.parentNode.parentNode.childNodes[3].textContent;



                                   activeStatus.addEventListener("click", function(e){

                                       var active_status = e.target.textContent;


                                       if(active_status == "Inactive")
                                       {

                                           e.target.innerHTML = "Active";

                                            userStatus.style.backgroundColor ="#F39200";


                                       }else if(active_status == "Active"){

                                              e.target.innerHTML = "Inactive";

                                              userStatus.style.backgroundColor ="green";


                                            }


                                    })



                               })

                           }



                        }





                        function activeInactive(userGuest_nameObj)
                        {

                              var activeStatus = document.getElementById("activeStatus");
                              var avatarStatus = document.querySelectorAll(".avatarStatus");
                              var userGuest_name = userGuest_nameObj.textContent;


                                     xhr.onreadystatechange = function() {

                                         if(this.readyState == 4 && this.status == 200){

                                                 activeStatus.innerHTML = xhr.responseText;

                                                 var activeStatusVal = activeStatus.textContent;


                                                 if(activeStatusVal == "Status(Active)")
                                                 {

                                                       activeStatus.style.color = "green";

                                                 }else if(activeStatusVal == "Status(Inactive)"){

                                                   activeStatus.style.color = "#F39200";


                                                 }

                                                 changeStatus(userGuest_nameObj, activeStatus);
                                                 getAll_userData(userGuest_nameObj)

                                            }

                                       }


                                     xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/active_inactive.php?guest_name='+userGuest_name,true);
                                     xhr.send();

                        }



                        function changeStatus(userGuest_nameObj, activeStatus)
                        {

                              var activeStatus = document.getElementById("activeStatus");
                              var active_inactiveUsers = document.getElementById("deleteCont");
                              var active_inactiveCheck = document.getElementById("deleteCheck");
                              var active_inactive_user = document.getElementById("de_activate_user");
                              var active_inactiveCheck_error = document.getElementById("deleteCheck_error");
                              var active_inactivePass = document.getElementById("deletePass");

                              var delete_user = document.getElementById("delete_user");


                              activeStatus.addEventListener("click", function(){

                                delete_user.style.display = "none";
                                active_inactive_user.style.display = "block";

                                if(activeStatus.textContent == "Status(Active)")
                                {



                                     active_inactive_user.value = "Deactivate";

                                     active_inactiveCheck_error.innerHTML = "are you sure you want to Deactivate this user? Gives the password to delete it";

                                     active_inactive_user.addEventListener("click", function(e){

                                         e.preventDefault();



                                         deactivated(userGuest_nameObj, active_inactivePass, active_inactiveCheck_error,activeStatus, active_inactive_user);

                                     })


                                }else if(activeStatus.textContent == "Status(Inactive)"){

                                    active_inactive_user.value = "Activate";

                                    active_inactiveCheck_error.innerHTML = "are you sure you want to Activate this user? Gives the password to delete it";

                                    active_inactive_user.addEventListener("click", function(e){

                                        e.preventDefault();


                                        activated(userGuest_nameObj, active_inactivePass, active_inactiveCheck_error, activeStatus, active_inactive_user);

                                    })


                                }


                                  $(deleteCheck).animate({

                                     top: 400,

                                  },{

                                     duration: 700,
                                     easing: "easeOutBack",

                                  })



                              })

                        }



                        function activated(userGuest_nameObj, active_inactivePass, active_inactiveCheck_error, activeStatus, active_inactive_user)
                        {

                             var active_inactivePassVal = active_inactivePass.value;
                             var userGuest_name = userGuest_nameObj.textContent;
                             var guestStatus = userGuest_nameObj.parentNode.childNodes[1].childNodes[3];

                             var deleteCheck = document.getElementById("deleteCheck");
                             var deleteCheck_error = document.getElementById("deleteCheck_error");
                             var deletePassVal = document.getElementById("deletePass");
                             //alert(guestStatus);

                              xhr.onreadystatechange = function() {

                                    if(this.readyState == 4 && this.status == 200){

                                        active_inactiveCheck_error.innerHTML = xhr.responseText;

                                        if(active_inactiveCheck_error.innerHTML == 'Activated, An email is send to the current guest user whith een temporary password')
                                         {

                                              activeStatus.style.color = "green";
                                              guestStatus.style.backgroundColor = "green";
                                              active_inactive_user.value = "Deactivated";
                                              activeStatus.innerHTML = "Status(Active)";


                                              $(function(){

                                                  $(deleteCheck).animate({

                                                     top: 0,

                                                  },{

                                                     duration: 700,
                                                     easing: "easeInOutBack",

                                                  })

                                              })

                                              deleteCheck_error.innerHTML = "are you sure you want to delete this user? Gives the password to delete it";
                                              deletePassVal.value = "";

                                         }

                                    }

                              }

                              if(active_inactivePassVal != "")
                              {

                                xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/activated.php?guest_name='+userGuest_name+'&passVal='+active_inactivePassVal,true);
                                xhr.send();


                              }else{

                                 active_inactiveCheck_error.innerHTML = "Enter the password...";

                              }

                        }



                        function deactivated(userGuest_nameObj, active_inactivePass, active_inactiveCheck_error, activeStatus, active_inactive_user)
                        {

                              var active_inactivePassVal = active_inactivePass.value;
                              var userGuest_name = userGuest_nameObj.textContent;
                              var guestStatus = userGuest_nameObj.parentNode.childNodes[1].childNodes[3];

                              var deleteCheck = document.getElementById("deleteCheck");
                              var deleteCheck_error = document.getElementById("deleteCheck_error");
                              var deletePassVal = document.getElementById("deletePass");

                              xhr.onreadystatechange = function() {

                                    if(this.readyState == 4 && this.status == 200){

                                        active_inactiveCheck_error.innerHTML = xhr.responseText;

                                        if(active_inactiveCheck_error.innerHTML == "Guest user Deactivated. An e-mail was sent to him to warn him.")
                                         {

                                              activeStatus.style.color = "#F39200";
                                              guestStatus.style.backgroundColor = "#F39200";
                                              active_inactive_user.value = "Activated";
                                              activeStatus.innerHTML = "Status(Inactive)";


                                              $(function(){

                                                  $(deleteCheck).animate({

                                                     top: 0,

                                                  },{

                                                     duration: 700,
                                                     easing: "easeInOutBack",

                                                  })

                                              })

                                              deleteCheck_error.innerHTML = "are you sure you want to delete this user? Gives the password to delete it";
                                              deletePassVal.value = "";

                                         }

                                    }

                              }

                              if(active_inactivePassVal != "")
                              {
                                xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/deactivated.php?guest_name='+userGuest_name+'&passVal='+active_inactivePassVal,true);
                                xhr.send();
                              }else{

                                 active_inactiveCheck_error.innerHTML = "Enter the password...";

                              }

                        }



                        function display_usersRights()
                        {

                            var avatarStatus = document.querySelectorAll(".avatarStatus");


                            for (var i = 0; i < avatarStatus.length; i++) {

                                var avatarStatusArr = avatarStatus[i];
                                avatarStatusArr.addEventListener("click", function(e){

                                    var userGuest_name = e.target.parentNode.parentNode.childNodes[3].textContent;
                                    var userGuest_nameObj = e.target.parentNode.parentNode.childNodes[3];


                                          var changeUser_right = document.getElementById("changeUser_right");

                                          xhr.onreadystatechange = function() {

                                                      if(this.readyState == 4 && this.status == 200){

                                                           changeUser_right.innerHTML = xhr.responseText;
                                                           displayRights_style();
                                                           update_rights(userGuest_name);
                                                           activeInactive(userGuest_nameObj);
                                                           guestUser_data(userGuest_name);

                                                      }

                                                }


                                                  xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/displayRights.php?userGuest_name='+userGuest_name,true);
                                                  xhr.send();



                                        })

                                  }

                        }




                        function displayRights_style()
                        {

                            var rightsIcon = document.querySelectorAll(".guestRightsCont span");

                            for (var i = 0; i < rightsIcon.length; i++) {

                                 var rightsIconArr = rightsIcon[i];
                                 var rightsIconStatus = rightsIconArr.parentNode.childNodes[5].textContent;
                                 var rightsIconStatus_style = rightsIconArr.parentNode.childNodes[5];
                                //alert(rightsIconStatus);

                                 if(rightsIconStatus == "(Yes)")

                                 {

                                     rightsIconArr.style.color = "#32323A";
                                     rightsIconArr.style.backgroundColor = "white";
                                     rightsIconStatus_style.style.color = "green";

                                 }

                                 else if(rightsIconStatus == "(No)")

                                 {

                                   rightsIconArr.style.color = "white";
                                   rightsIconArr.style.backgroundColor = "#32323A";
                                    rightsIconStatus_style.style.color = "#F91535";

                                 }


                            }


                        }



                        function update_rights(userGuest_name)
                        {


                          var rightsIcon = document.querySelectorAll(".guestRightsCont span");


                          for (var i = 0; i < rightsIcon.length; i++)
                          {

                                   var rightsIconArr = rightsIcon[i];



                                   rightsIconArr.addEventListener("click", function(e){

                                          var rightsIconStatus = rightsIconArr.parentNode.childNodes[5].textContent;
                                          var rightsIconStatus_style = rightsIconArr.parentNode.childNodes[5];
                                          var rights_statusContent = document.querySelectorAll(".rights_status");
                                          var n_permission = rights_statusContent[3].parentNode.childNodes[1];


                                           if(rights_statusContent[0].textContent == "(No)" && rights_statusContent[1].textContent == "(No)" && rights_statusContent[2].textContent == "(No)")
                                           {


                                                rights_statusContent[3].innerHTML = "(Yes)";
                                                rights_statusContent[3].style.color = "green";
                                                n_permission.style.color = "#32323A";
                                                n_permission.style.backgroundColor = "white";


                                           }else if(rights_statusContent[0].textContent == "(Yes)" || rights_statusContent[1].textContent == "(Yes)" || rights_statusContent[2].textContent == "(Yes)"){

                                             rights_statusContent[3].innerHTML = "(No)";
                                             rights_statusContent[3].style.color = "#F91535";
                                             n_permission.style.color = "white";
                                             n_permission.style.backgroundColor = "#32323A";

                                           }

                                           var target = e.target;
                                           var targetStatus = e.target.parentNode.childNodes[5].textContent;
                                           var targetStatus_style = e.target.parentNode.childNodes[5];


                                           if(targetStatus == "(Yes)")
                                           {

                                               target.style.color = "white";
                                               target.style.backgroundColor = "#32323A";
                                               targetStatus_style.innerHTML = "(No)";
                                               targetStatus_style.style.color = "#F91535";

                                           }else{

                                               target.style.color = "#32323A";
                                               target.style.backgroundColor = "white";
                                               targetStatus_style.innerHTML = "(Yes)";
                                               targetStatus_style.style.color = "green";

                                            }




                                     })


                              }

                              rightsUpdated(userGuest_name);

                        }



                        function rightsUpdated(userGuest_name)
                        {

                              var change_rights = document.getElementById("change_rights_sub");

                              change_rights_sub.addEventListener("click", function(e){

                                     e.preventDefault();

                                      var changeRights_passVal = document.getElementById("changeRights_pass").value;
                                      var rightsError = document.getElementById("rightsError");
                                      var rights_statusContent = document.querySelectorAll(".rights_status");


                                         xhr.onreadystatechange = function() {

                                                     if(this.readyState == 4 && this.status == 200){

                                                          rightsError.innerHTML = xhr.responseText;

                                                     }

                                               }


                                         if(changeRights_passVal != "")
                                         {

                                           xhr.open('GET','../bemika_cms/web_applicatie/models/ajaxRequest/addUser_ajaxRequest/changeRights.php?userGuest_name='+userGuest_name+'&changeRights_passVal='+changeRights_passVal+'&upload='+rights_statusContent[0].textContent+'&delete='+rights_statusContent[1].textContent+'&update='+rights_statusContent[2].textContent+'&nPermission='+rights_statusContent[3].textContent,true);
                                           xhr.send();

                                         }else{

                                             rightsError.innerHTML = "Enter your password...";

                                         }


                                 })

                        }



                })

             </script>

        <?php



     }



     public function displayAll_categories()
     {

         $select = $this->PDO()->query("SELECT*FROM departments");

         while($display = $select->fetch())
         {

           ?>

           <script type="text/javascript">

              window.addEventListener("load", function(){

                  var category = document.getElementById("catagory");

                  var newCategory = document.createElement("option");
                  newCategory.value = "<?php echo $display['department_name'];?>";
                  newCategory.innerHTML = "<?php echo $display['department_name'];?>";

                  category.appendChild(newCategory);


              })

           </script>

           <?php

         }

     }



     public function checkGuest_userStatus()
     {

          $statusColor = $this->PDO()->query("SELECT status_color FROM guest_users");
          $apply_statusColor = $statusColor->fetch();


              ?>

              <script type="text/javascript">

                 window.addEventListener("load", function(){

                    var userStatus = document.querySelectorAll(".userStatus");

                    for (var i = 0; i < userStatus.length; i++) {

                        var userStatusArr = userStatus[i];
                        userStatus.style.backgroundColor = "<?php echo $apply_statusColor['status_color'];?>";


                    }

                 })

              </script>

              <?php

         }






}

 ?>
