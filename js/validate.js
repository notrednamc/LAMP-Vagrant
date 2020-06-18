////// START //////
// This function and jQuery will display "Passwords [do not] match"
// withle the user types into the password confirm input box on the Register page
function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#password_conf").val();

    if (password != confirmPassword)
        $("#divPassMatch").html("Passwords do not match!").attr('style','color:#FF0000');
        // $("#divPassMatch").attr('style','color:#FF0000');
    else
        $("#divPassMatch").html("Passwords match.").attr('style','color:#008000');
        // $("#divPassMatch").attr('style','color:#008000');
}

$(document).ready(function () {
   $("#password_conf").keyup(checkPasswordMatch);
});
////// END //////
