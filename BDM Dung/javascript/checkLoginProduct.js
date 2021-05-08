const successBtn = document.querySelector('.btn-success');

const snackbarContainer = document.getElementById('snackbar-container');

function buy_btn() {
    if(localStorage.getItem("checkValue")) {
        window.onload = null;
        window.location.assign("order-placement.html");
    }
    else {
        window.onload = null;
        window.location.assign("account_info.html");
    } 
}

successBtn.addEventListener('click', ()=>{
    if(localStorage.getItem("checkValue")) {
        snackbar('success', '<b>Success!</b> <br> Your item have been added to cart', 3000);
    }
    else {
        window.onload = null;
        window.location.assign("account_info.html");
    }
})

function snackbar(type, msg, time){
    const para = document.createElement('P');
    para.classList.add('snackbar');
    para.innerHTML = `${msg}`;

    if(type ==='success'){
        para.classList.add('success');
    }

    snackbarContainer.appendChild(para);
    para.classList.add('fadeout');

    setTimeout(()=>{
        snackbarContainer.removeChild(para)
    }, time)
}