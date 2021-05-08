var mail_update = localStorage.getItem("mail_to_others");


document.getElementById("mail_change").innerHTML = mail_update;
document.getElementById("mail_change_respon").innerHTML = "EMAIL: " + mail_update;

function Removecheck()
{
    localStorage.removeItem("checkValue");
}


