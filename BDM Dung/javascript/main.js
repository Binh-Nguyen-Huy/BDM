//register password
function ValidPwd()
{
    var form = document.getElementById("form");
    var input_pass = document.getElementById("register_input_pass").value;
    var pass_annouce = document.getElementById("pass_announce");
    var passformat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;

    if(input_pass.match(passformat))
    {
        form.classList.add("Valid");  //The pop up alert for a invalid email address
        form.classList.remove("Invalid");
        pass_annouce.innerHTML = "valid password";
        pass_annouce.style.color = "#00ff00";    
    }
    else
    {
        form.classList.remove("Valid");  //The pop up alert for a invalid email address
        form.classList.add("Invalid");
        pass_annouce.innerHTML = "Invalid! At least 1 a-z, 1 A-Z, 1 digits, 1 special character";
        pass_annouce.style.color = "#ff0000";
    }

    return input_pass;
}



//  visible register
function checkDisplay()
{
    if(document.getElementById("register_input_1").checked == true && document.getElementById("register_input_2").checked == false )
    {
        document.getElementById("abc").style.display = "";
        document.getElementById("content_head_apply").style.display = "";
        console.log("display");
    }
    else
    {
        document.getElementById("abc").style.display = "none";
        document.getElementById("content_head_apply").style.display = "none";
        console.log("cannot display");
    }
}

// repeat pass register
function checkPass()
{
    var form = document.getElementById("form");
    var input_repeat = document.getElementById("register_input_repeat_pwd").value;
    var pwdrepeat_announce = document.getElementById("repeatpass_announce")
    var input_pwd = ValidPwd();

    if(input_repeat == input_pwd && input_pwd != "")
    {
        form.classList.add("Valid");  //The pop up alert for a invalid email address
        form.classList.remove("Invalid");
        pwdrepeat_announce.innerHTML = "valid password";
        pwdrepeat_announce.style.color = "#00ff00";
        return true;
    }
    else
    {
        form.classList.remove("Valid");  //The pop up alert for a invalid email address
        form.classList.add("Invalid");
        pwdrepeat_announce.innerHTML = "Invalid! Not the same password";
        pwdrepeat_announce.style.color = "#ff0000";
        return false;
    }
}


//Register Email
function ValidateEmail_register()
{
var form = document.getElementById("form");
var input_mail = document.getElementById("register_input_email").value;
var text_annouce = document.getElementById("text_mail_announce");

var mailformat = /^([a-zA-Z0-9\.]{3,})@([a-zA-Z0-9\.]+)\.([a-zA-Z]{2,5})$/;

var acong =  input_mail.indexOf("@");
var before_acong = acong - 1;
var after_acong = acong + 1;
var lengthmail = input_mail.length; 
var space = input_mail.indexOf(" ");
var dot = input_mail.lastIndexOf(".");

// document.getElementById("demo").innerHTML = lengthmail - 1; 

if(input_mail.match(mailformat))
{
    if(input_mail.charAt(0) == "." || input_mail.charAt(before_acong) == "." || input_mail.charAt(after_acong) == "." || space != -1 || dot == -1)
    {
        form.classList.remove("Valid");  //The pop up alert for a invalid email address
        form.classList.add("Invalid");
        text_annouce.innerHTML = "Invalid email";
        text_annouce.style.color = "#ff0000";
        return false;
    }
    else
    {
        var check = true;
        for(i = 0; i <= lengthmail - 1; i++)
        {
            if(input_mail.charAt(i) == "." && input_mail.charAt(i+1) == ".")
            {
                check = false;
                break;
            }
        }

        if(check == false)
        {
            form.classList.remove("Valid");  //The pop up alert for a invalid email address
            form.classList.add("Invalid");
            text_annouce.innerHTML = "Invalid email";
            text_annouce.style.color = "#ff0000";
            return false;

        }
        else
        {
            form.classList.add("Valid");  //The pop up alert for a valid email address
            form.classList.remove("Invalid");
            text_annouce.innerHTML = "Valid email";
            text_annouce.style.color = "#00ff00";
            return true;
        }
    }
}
else
{
    form.classList.remove("Valid");  //The pop up alert for a invalid email address
    form.classList.add("Invalid");
    text_annouce.innerHTML = "Invalid email";
    text_annouce.style.color = "#ff0000";
    return false;
}
}

// register phone number
function ValidatePhone_register()
{
    var form = document.getElementById("form");
    var input_phone = document.getElementById("register_input_phone").value;
    var text_annouce_phone = document.getElementById("phone_announce");
    
    var phoneformat = /^([\d])([ .-]?[\d]){8,10}$/

    if(input_phone.match(phoneformat))
    {
        form.classList.add("Valid");  //The pop up alert for a invalid email address
        form.classList.remove("Invalid");
        text_annouce_phone.innerHTML = "valid phone number";
        text_annouce_phone.style.color = "#00ff00";    
        return true;
    }
    else
    {
        form.classList.remove("Valid");  //The pop up alert for a invalid email address
        form.classList.add("Invalid");
        text_annouce_phone.innerHTML = "Invalid phone number";
        text_annouce_phone.style.color = "#ff0000";
        return false;
    }

}

// register zipcode
function Validatzipcode_register()
{
    var form = document.getElementById("form");
    var input_zip = document.getElementById("register_input_zip").value;
    var text_annouce_zip = document.getElementById("zip_announce");
    
    var zipformat = /^([\d]){4,6}$/

    if(input_zip.match(zipformat))
    {
        form.classList.add("Valid");  //The pop up alert for a invalid email address
        form.classList.remove("Invalid");
        text_annouce_zip.innerHTML = "valid Zip Code";
        text_annouce_zip.style.color = "#00ff00";    
        return true;
    }
    else
    {
        form.classList.remove("Valid");  //The pop up alert for a invalid email address
        form.classList.add("Invalid");
        text_annouce_zip.innerHTML = "Invalid Zip Code. Require 4-6 digits";
        text_annouce_zip.style.color = "#ff0000";
        return false;
    }
}
// register address
function validAddress(id_1, id_2)
{
    var form = document.getElementById("form");
    var input_form = /^([0-9a-zA-Z\ ])([,.]?[0-9a-zA-Z\ ]){2,}$/;
    var input_name = document.getElementById(id_1).value;
    var name_announce = document.getElementById(id_2);

    var input_length = input_name.length;
    const min_length = 3;

    var count = 0;
    for(i = 0; i < min_length; i++)
    {
        if(input_name.charAt(i) == " " || input_name.charAt(i) == "." || input_name.charAt(i) == ",")
        {
            count++;
        }
    }

    var index_length = input_length - count;

    if((input_name.match(input_form)) && (index_length >= min_length)) 
    {
        form.classList.add("Valid");
        form.classList.remove("Invalid");
        name_announce.innerHTML = "Valid Name";
        name_announce.style.color = "#00ff00";
        return true;
    }
    else
    {
        form.classList.remove("Valid");
        form.classList.add("Invalid");
        name_announce.innerHTML = "Invalid Name. Required at least 3 letters";
        name_announce.style.color = "#ff0000";
        return false;
    }
}

// register name, city
function validNameAll(id_1, id_2)
{
    var form = document.getElementById("form");
    var input_form = /^([a-zA-Z])([ ]?[a-zA-Z]){2,}$/;
    var input_name = document.getElementById(id_1).value;
    var name_announce = document.getElementById(id_2);

    if(input_name.match(input_form))
    {
        form.classList.add("Valid");
        form.classList.remove("Invalid");
        name_announce.innerHTML = "Valid Name";
        name_announce.style.color = "#00ff00";
        return true;
    }
    else
    {
        form.classList.remove("Valid");
        form.classList.add("Invalid");
        name_announce.innerHTML = "Invalid Name. Required at least 3 letters";
        name_announce.style.color = "#ff0000";
        return false;
    }
}

//Name require
function ValidName()
{
    var form = document.getElementById("form");
    var name_form = /^([a-zA-Z])([ ]?[a-zA-Z]){2,}$/;
    var input_name = document.getElementById("name").value;
    var name_announce = document.getElementById("name_announce");

    if(input_name.match(name_form))
    {
        form.classList.add("Valid");
        form.classList.remove("Invalid");
        name_announce.innerHTML = "Valid Name";
        name_announce.style.color = "#00ff00";
        console.log(input_name);
        return true;
    }
    else
    {
        form.classList.remove("Valid");
        form.classList.add("Invalid");
        name_announce.innerHTML = "Invalid Name. Required at least 3 letters";
        name_announce.style.color = "#ff0000";
        console.log("eror_name");

        return false;
    }
}

// Contact New Email

function ValidateEmail()
{
var form = document.getElementById("form");
var input_mail = document.getElementById("email").value;
var text_annouce = document.getElementById("text_mail_announce");

var mailformat = /^([a-zA-Z0-9\.]{3,})@([a-zA-Z0-9\.]+)\.([a-zA-Z]{2,5})$/;

var acong =  input_mail.indexOf("@");
var before_acong = acong - 1;
var after_acong = acong + 1;
var lengthmail = input_mail.length; 
var space = input_mail.indexOf(" ");
var dot = input_mail.lastIndexOf(".");

// document.getElementById("demo").innerHTML = lengthmail - 1; 

if(input_mail.match(mailformat))
{
    if(input_mail.charAt(0) == "." || input_mail.charAt(before_acong) == "." || input_mail.charAt(after_acong) == "." || space != -1 || dot == -1)
    {
        form.classList.remove("Valid");  //The pop up alert for a invalid email address
        form.classList.add("Invalid");
        text_annouce.innerHTML = "Invalid email";
        text_annouce.style.color = "#ff0000";
        return false;
    }
    else
    {
        var check = true;
        for(i = 0; i <= lengthmail - 1; i++)
        {
            if(input_mail.charAt(i) == "." && input_mail.charAt(i+1) == ".")
            {
                check = false;
                break;
            }
        }

        if(check == false)
        {
            form.classList.remove("Valid");  //The pop up alert for a invalid email address
            form.classList.add("Invalid");
            text_annouce.innerHTML = "Invalid email";
            text_annouce.style.color = "#ff0000";
            return false;

        }
        else
        {
            form.classList.add("Valid");  //The pop up alert for a valid email address
            form.classList.remove("Invalid");
            text_annouce.innerHTML = "Valid email";
            text_annouce.style.color = "#00ff00";
            return true;
        }
    }
}
else
{
    form.classList.remove("Valid");  //The pop up alert for a invalid email address
    form.classList.add("Invalid");
    text_annouce.innerHTML = "Invalid email";
    text_annouce.style.color = "#ff0000";
    return false;
}
}

// Phone Number Contact

function ValidatePhone()
{
    var form = document.getElementById("form");
    var input_phone = document.getElementById("phone").value;
    var text_annouce_phone = document.getElementById("phone_announce");
    
    var phoneformat = /^([\d])([ .-]?[\d]){8,10}$/

    if(input_phone.match(phoneformat))
    {
        form.classList.add("Valid");  //The pop up alert for a invalid email address
        form.classList.remove("Invalid");
        text_annouce_phone.innerHTML = "valid phone number";
        text_annouce_phone.style.color = "#00ff00";    
        return true;
    }
    else
    {
        form.classList.remove("Valid");  //The pop up alert for a invalid email address
        form.classList.add("Invalid");
        text_annouce_phone.innerHTML = "Invalid phone number";
        text_annouce_phone.style.color = "#ff0000";
        return false;
    }

}

// Contact option type
function Valid()
{
    var check_1 = document.getElementsByClassName("Contact_Days");
    var days_announce = document.getElementById("day_announce");
    var count = 0;
    for (i= 0; i < check_1.length; i++)
    {
        if(check_1[i].checked == true)
        {
            console.log(check_1[i]);
            count++;
        }
    }

    if(count == 0)
    {
        days_announce.innerHTML = "You need to choose at least 1 day!";
        days_announce.style.color = "red";
        return false;
    }
    else
    {
        return true;
    }
}

// Contact checkbox

// Contact Message
function BoxMessage()
{
    var check_mess = document.getElementById("Text_Box").value;
    var check_mess_length = check_mess.length;
    var mess_annouce = document.getElementById("mess_box");
    const min_length = 50;
    const max_length = 500;

    var space_count = 0;
    for(i = 0; i < check_mess_length; i++)
    {
        if(check_mess.charAt(i) == " ")
        space_count++;
    }

    if((check_mess_length - space_count) < min_length)
    {
        var more_letter_need = min_length - (check_mess_length - space_count);
        mess_annouce.innerHTML = more_letter_need + " more letters are needed!";
        mess_annouce.style.color = "red";
        return false;
    }
    else if((check_mess_length - space_count) > max_length)
    {
        var delete_letter = (check_mess_length - space_count) - max_length;
        mess_annouce.innerHTML = delete_letter + " letters needed to be deleted!";
        mess_annouce.style.color = "red";
        return false;
    }
    else
    {
        var letter_left = max_length - (check_mess_length - space_count);
        mess_annouce.innerHTML = "You can type " + letter_left + " more letters!"
        mess_annouce.style.color = "green";
        return true;
    }
}

const element = document.querySelector('form');
element.addEventListener('submit', event => {
    var error_mess = false;
    if(!BoxMessage())
    {
        error_mess = true;
    }

    if(!ValidName())
    {
        error_mess = true;
    }
    
    if(!ValidatePhone())
    {
        error_mess = true;
    }

    if(!ValidateEmail())
    {
        error_mess = true;
    }

    if(!Valid())
    {
        error_mess = true;
    }

    if(error_mess == true)
    {
        console.log("wrong");
        event.preventDefault();
    }
});

