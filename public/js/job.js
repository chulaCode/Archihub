function validate1(val) {
    v1 = document.getElementById("title");

    flag1 = true;
    flag2 = true;

    if (val >= 1 || val == 0) {
        if (v1.value == "") {
            v1.style.borderColor = "red";
            alert("fill the empty field");
            flag1 = false;
        }
        
         
        else {
            v1.style.borderColor = "white";
            flag1 = true;
        }
    }

    flag = flag1 && flag2;

    return flag;
}

function validate2(val) {
    v2 = document.getElementById("desc");

    flag1 = true;
    flag2 = true;

    if (val >= 1 || val == 0) {
        if (v2.value == "") {
            v2.style.borderColor = "red";
            alert("fill the empty field");
            flag1 = false;
        }else if(v2.value.length<50){
            v2.style.borderColor = "red";
            alert("Input charaacters must be at least 50")
            flag1 = false;
        } 
        else {
            v1.style.borderColor = "white";
            flag1 = true;
        }
    }
  

    flag = flag1 && flag2;

    return flag;
}
function validate3(val) {
    v3 = document.getElementById("salary");
    v4 = document.getElementById("last_date");
    flag1 = true;
    flag2 = true;

    if (val >= 1 || val == 0) {
        if (v3.value == "") {
            v3.style.borderColor = "red";
            alert("fill the empty field");
            flag1 = false;
        } else {
            v1.style.borderColor = "white";
            flag1 = true;
        }
    }

    if (val >= 2 || val == 0) {
        if (v4.value == "") {
            v4.style.borderColor = "red";
            alert("fill the empty field");
            flag2 = false;
        } else {
            v2.style.borderColor = "white";
            flag2 = true;
        }
    }
    flag = flag1 && flag2;

    return flag;
}
$(document).ready(function() {
    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;

   //description text box number of word count
   $('textarea').keyup(updateCount);
   $('textarea').keydown(updateCount);

    function updateCount() {
        var cs = $(this).val().length;
        $('#count').text(cs);
    }

    $(".next").click(function() {
        if (flag == true) {
            current_fs = $(this).parent();
            next_fs = $(this)
                .parent()
                .next();

            //Add Class Active
            $("#progressbar li")
                .eq($("fieldset").index(next_fs))
                .addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate(
                { opacity: 0 },
                {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative"
                        });
                        next_fs.css({ opacity: opacity });
                    },
                    duration: 600
                }
            );
        }
    });

    $(".prev").click(function() {
        current_fs = $(this).parent();
        previous_fs = $(this)
            .parent()
            .prev();

        //Remove class active
        $("#progressbar li")
            .eq($("fieldset").index(current_fs))
            .removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate(
            { opacity: 0 },
            {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        display: "none",
                        position: "relative"
                    });
                    previous_fs.css({ opacity: opacity });
                },
                duration: 600
            }
        );
    });

    $(".radio-group .radio").click(function() {
        $(this)
            .parent()
            .find(".radio")
            .removeClass("selected");
        $(this).addClass("selected");
    });

    $(".submit").click(function() {
        return false;
    });
    /*end of validation form input field */

});
