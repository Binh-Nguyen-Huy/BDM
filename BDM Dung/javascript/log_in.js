window.onload = () =>{
    this.sessionStorage.setItem("password", "password");
}

var input =  document.getElementsByTagName("input");
var login = document.getElementById("log_in");
var form = document.querySelector('form');

form.onsubmit = ()=>{return false};


login.onclick = () =>{
    if((input[2].value != "") && (input[3].value != ""))
    {
        if(input[3].value == sessionStorage.getItem("password"))
        {
            var mail_in = input[2].value;
            var pwd_in = input[3].value;
            localStorage.setItem("mail_to_others", mail_in);
            localStorage.setItem("pwd_to_others", pwd_in);

            localStorage.setItem("checkValue", "true");

            form.onsubmit = () => {return true};
        }
        else
        {
            document.getElementById("login_pwd").innerHTML = "Not Correct Password!";
            document.getElementById("login_pwd").style.color = "red"
        }
    }
}

