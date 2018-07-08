// login.html validation
var Status = false;
var userName = document.getElementById("userNameBox");
var password = document.getElementById("passwordBox");
var loginButton = document.getElementById("loginForm");
var cancelButton = document.getElementById("cancelButton");

function emptyField()
{
    userName.value ="";
    password.value="";
}
function validate()
{
    if(userName.value != "" || password.value != "")
        {
            userName.style.borderColor="";
            password.style.borderColor ="";
            return true;
        }
    
    else if(userName.value == "" || password.value == "" )
        {
            userName.focus();
            userName.style.borderColor ="red";
            return false;
        }

}
function validateForm(e)
{
    if(validate)
        {
             e.preventDefault();
        }
    
}


loginButton.addEventListener('click',validate,false);
cancelButton.addEventListener('click',emptyField,false);
loginButton.addEventListener('submit',validateForm,false);