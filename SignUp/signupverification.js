// Boolean variables to validate user credentials with regex
var name_check = false;
var username_check = false;
var password_check = false;
var repassword_check = false;
var submit = false;


// Regex that validates a full name with alpha characters between 8 and 30
const regex_name = /^[\w\s]{8,30}$/;
// Regex that validates a username with alphanumeral characters between 6 and 30
const regex_username = /^[\w\d]{6,30}$/;
// Regex that validates password with alpha characters, at least one capital letter, special character and be between 8 and 30 characters
const regex_password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,30}$/;

$(document).ready(function(){
    // Dom manipulation: Fetching user inputs after the DOM is ready
    var name = $('#name');
    var usernameinput = $('#username');
    var password = $('#password');
    var repassword = $('#re-password');

    // On keyup, when the user enters his or her name, the characters are evaluated, with the requirement displaying under the input field till the user's credential is validated
    $('#name').keyup(function(){
        if(name.val().length > 0){
            if(regex_name.test(name.val())){
                $('#error-1').css('display', 'none');
                $('#name').css('border-bottom', '1px solid yellowgreen');
                name_check = true;
                //If the user credentials for full name follows the regex, the error line is cleared and the namecheck boolean is set to true
            } 
            else{
                $('#name').css('border-bottom', '1px solid red');
                $('#error-1').css('display', 'block');
                name_check = false;
                //If the user credentials for full name does not follows the regex, the error line is cleared and the namecheck boolean is set to true
            }
        } else{
            $('#name').css('border-bottom', '1px solid black');
            $('#error-1').css('display', 'none');
        }
    });

    // The post method of the ajax was used to validate usernames by fetching existing usernames in the database to disallow similar usernames
    $('#username').keyup(function(){
        $.post("usernamevalidation.php", {usernameinput:usernameinput.val()}, function(data){
            if(usernameinput.val().length > 0){
                if(regex_username.test(usernameinput.val())){
                    if(usernameinput.val() === data){
                        // If the user input matches 'data', from the Username.php, it means the username exists and thus cannot be used
                        $('#username').css('border-bottom', '1px solid red');
                        $('#error-2').html('Username taken');
                        $('#error-2').css('display', 'block');
                        //If the user credentials for username matches an existing one in the database the error line is maintained and the usernamecheck boolean is set to false
                        username_check = false;
                    } 
                    else {
                        $('#error-2').css('display', 'none');
                        $('#username').css('border-bottom', '1px solid yellowgreen');
                        username_check = true;
                        //If the user credentials for username does not match an existing one in the database the error line is cleared and the username check boolean is set to true
                    }
                }
                else{
                    $('#username').css('border-bottom', '1px solid red');
                    $('#error-2').html('Username length must be between 6-30 characters without spaces or special characters [except underscore]');
                    $('#error-2').css('display', 'block');
                    username_check = false;
                    // If the credentials for username does not follow the regex, the error line is maintained and the username check variable is set to false 
                }
            }
            else{
                $('#error-2').css('display', 'none');
                $('#username').css('border-bottom', '1px solid black');
            }
        });
    });

    $('#password').keyup(function(){
        if(password.val().length > 0){
            if(regex_password.test(password.val())){
                $('#password').css('border-bottom', '1px solid yellowgreen');
                $('#error-3').css('display', 'none');
                password_check = true;
                //If the user credentials for password follows the regex, the error line is cleared and the password check boolean is set to true
            }
            else{
                $('#password').css('border-bottom', '1px solid red');
                $('#error-3').css('display', 'block');
                password_check = false;
                //If the user credentials for password does not follow the regex, the error line is maintained and the password check boolean is set to false
            }
        } 
        else {
            $('#password').css('border-bottom', '1px solid black');
            $('#error-3').css('display', 'none');
        }
    });

    $('#re-password').keyup(function(){
        if(repassword.val().length > 0){
            if(repassword.val() == password.val()){
                $('#re-password').css('border-bottom', '1px solid yellowgreen');
                $('#error-4').css('display', 'none');
                repassword_check = true;
                //If the user credentials for repassword matches the user input for password, the error line is cleared and the repasswordcheck boolean is set to true
            }
            else{
                $('#re-password').css('border-bottom', '1px solid red');
                $('#error-4').css('display', 'block');
                repassword_check = false;
                //If the user credentials for repassword does not matche the user input for repassword, the error line is maintained and the repasswordcheck boolean is set to false
            }
        } else{
            $('#re-password').css('border-bottom', '1px solid black');
            $('#error-4').css('display', 'none');
        }
    });
});

/**
    *@function validation() The validation function called by the signup to do the validation when the page is loaded. It returns true when all the boolean varibles are true and returns false when there is at least one false boolean value, PROMPTING THE USER TO CORRECTLY FILL OUT FORM
 */
const validation = () => {
    if(name_check && password_check && repassword_check && username_check){
        return true;
    } else {
        alert("Fill all fields correctly");
        return false;
    }
}