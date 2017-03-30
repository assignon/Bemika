<?php

   require "ajax/bd_connection.php";

    class languages
    {

          public function __construct()
          {

             $pdo = pdo();

          }


          public function addLanguage()
          {

             ?>

                 <script type="text/javascript">

                    window.addEventListener("load", function(){

                       var addLangVal = document.querySelector(".addLangVal");
                       var langIcons = document.getElementById("langIcon");
                       var langAdded = document.getElementById("langAdded");
                       var xhr;

                       if(window.XMLHttpRequest){

                          xhr = new XMLHttpRequest();

                       }else{

                          xhr = new ActiveXobject("Microsoft.XMLHTTP");

                       }


                       langAdded.addEventListener("click", function(e){

                           e.preventDefault();

                           var langName = addLangVal.value;
                           var langIcon_val = langIcons.files[0];
                           var addLanguagesError = document.getElementById("addLanguagesError");
                           var formData = new FormData();
                           formData.append('langIcon', langIcon_val);

                          // alert(langIcon_val.size);


                           xhr.onreadystatechange = function() {

                                  if(this.readyState == 4 && this.status == 200){

                                      addLanguagesError.innerHTML = xhr.responseText;
                                      displayLangs();

                                 }

                            }

                            if(langName != "" && langIcon != "")
                            {

                               xhr.open('POST','ajax/addLanguage.php?langName='+langName,true);
                               xhr.send(formData);

                           }else{

                              addLanguagesError.innerHTML = "Gives a name to the new languages and choose a image";

                           }



                       })



                       function  displayLangs()
                       {

                           var langsReceiver = document.getElementById("langsReceiver");

                           xhr.onreadystatechange = function() {

                                  if(this.readyState == 4 && this.status == 200){

                                      langsReceiver.innerHTML = xhr.responseText;
                                      chooseLanguage("titel_id", "content_id", "addContent", "content");

                                 }

                            }


                               xhr.open('GET','ajax/displayLanguage.php',true);
                               xhr.send();

                       }
                       displayLangs();



                       function chooseLanguage(titel_id, content_id, submit_id, table_name)
                       {

                          var newLangs = document.querySelectorAll(".newLangs");
                          var defaultLanguague = document.getElementById("defaultLanguague");
                          var defaultLanguagueSrc = defaultLanguague.src;
                          var langsName;
                          var langsSrc;
                          var sub = document.getElementById(submit_id);
                          var languageContainer = document.getElementById("languageContainer");
                          alert(sub.offsetTop);

                          languageContainer.style.top = sub.offsetTop;
                          languageContainer.style.left = sub.offsetLeft/2;



                          for (var i = 0; i < newLangs.length; i++) {

                              var newLangsArr = newLangs[i];

                              newLangsArr.addEventListener("click", function(e){

                                 langsName = e.target.parentNode.childNodes[3].textContent;
                                 langsSrc = e.target.src;
                                    //alert(langsName);
                                 defaultLanguague.src = langsSrc;

                              })

                          }


                          var submit_id = document.getElementById(submit_id);

                          submit_id.addEventListener("click", function(e){

                                e.preventDefault();
                              //  alert(defaultLanguague.src);
                            //  alert(langsName);
                              //  alert(langsSrc);

                                if(defaultLanguague.src.substring(126) != "202-sphere.png")
                                {

                                    var titel_val = document.getElementById("titel_id").value;
                                    var content_val = document.getElementById("content_id").value;

                                    xhr.onreadystatechange = function() {

                                           if(this.readyState == 4 && this.status == 200){

                                               //langsReceiver.innerHTML = xhr.responseText;


                                          }

                                     }


                                        if(titel_val != "" && content_val != "")
                                        {

                                          xhr.open('GET','ajax/addContent.php?titelVal='+titel_val+'&content_val='+content_val+'&langsName='+langsName,true);
                                          xhr.send();

                                        }else{

                                            alert("Fill the fields");

                                        }

                                }else{

                                   alert("Choose a language");

                                }

                          })

                       }



                    })

                 </script>

             <?php

          }


    }

 ?>
