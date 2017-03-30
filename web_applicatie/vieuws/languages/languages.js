window.addEventListener("load", function(){

    var defaultLanguague = document.getElementById("defaultLanguague");
    var addLanguage = document.getElementById("addLanguage");
    var langDropDown = document.getElementById("langDropDown");
    var closeLanguage = document.getElementById("closeLanguage");


    defaultLanguague.addEventListener("click", function(){

      addLanguage.style.zIndex = "4";
      langDropDown.style.zIndex = "4";
      closeLanguage.style.zIndex = "4";


        $(function(){



          $(closeLanguage).animate({

             right: 23,
             bottom: 35,

          },{

             duration: 700,
             easing: "easeOutBack",

          })




           $(addLanguage).animate({

              left: 60,
              bottom: 35,

           },{

              duration: 700,
              easing: "easeOutBack",

           })


           $(langDropDown).animate({

              left: 35,
              top: 20,

           },{

              duration: 700,
              easing: "easeOutBack",

           })

        })

    })



    closeLanguage.addEventListener("click", function(){

      addLanguage.style.zIndex = "1";
      langDropDown.style.zIndex = "1";
      closeLanguage.style.zIndex = "1";

        $(function(){



          $(closeLanguage).animate({

             right: 0,
             bottom: 0,

          },{

             duration: 500,
             easing: "easeInOutBack",

          })




           $(addLanguage).animate({

              left: 0,
              bottom: 0,

           },{

              duration: 500,
              easing: "easeInOutBack",

           })


           $(langDropDown).animate({

              left: 0,
              top: 0,

           },{

              duration: 500,
              easing: "easeInOutBack",

           })

        })


    })



    var addLangsForm = document.getElementById("addLangsForm");
    var langs = document.getElementById("langs");

    addLanguage.addEventListener("click", function(){

         $(function(){

             $(addLangsForm).animate({

                 bottom: -350,

             },{

               duration: 500,
               easing: "easeOutBack",

             })

         })

    })



    langDropDown.addEventListener("click", function(){

      $(function(){

          $(langs).animate({

              bottom: -350,

          },{

            duration: 500,
            easing: "easeOutBack",

          })

      })

    })



    function closeLangsOptions(closerId, optionId)
    {

       var closer = document.getElementById(closerId);
       var options = document.getElementById(optionId);

       closer.addEventListener("click", function(){

             $(function(){

                 $(options).animate({

                     bottom: 200,

                 },{

                   duration: 500,
                   easing: "easeInOutBack",

                 })

             })

       })

    }
    closeLangsOptions("newLangsClose", "addLangsForm");
    closeLangsOptions("chooseLangsClose", "langs");

})
