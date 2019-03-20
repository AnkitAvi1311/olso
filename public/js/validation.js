function getId(id) {
    return document.getElementById(id);
}

//  function to validate email address
function validateEmail(email) {
    let reg = /^([a-zA-Z0-9\-\._])+\@+([a-zA-Z0-9\-\._])+\.+([a-zA-Z]{2,4})+$/;
    if(reg.test(email)) {
        return true;
    }else{
        return false;
    }
}

window.addEventListener('load', function() {
    const email = document.getElementById('email');
    const phone = getId('phone');
    
    //  validating while keyup
    email.addEventListener('keyup', function() {
        if(validateEmail(email.value)){
            email.style.borderColor = "lightgrey";           
        }else if(email.value == "") {
            email.style.borderColor = "lightgrey";
        }
    });

    //  email validation on lost focus
    email.onblur = function() {
        if(validateEmail(email.value)) {
            email.style.borderColor = "lightgrey";
        }else{
            email.style.borderColor = "red";
        }
    }

    //  real time phone number verification
    phone.onblur = function () {
        let reg = /^([0-9])+$/;
        if(phone.value.length == 10) {
            if(reg.test(phone.value)) {
                phone.style.borderColor = "lightgrey";
            }else{
                phone.style.borderColor = "red";
            }
        }else{
            phone.style.borderColor = "red";
        }
    }

    phone.onkeyup = function() {
        let reg = /^([0-9])+$/;
        if(phone.value.length == 10) {
            if(reg.test(phone.value)){
                phone.style.borderColor = "lightgrey";
            }
        }
    }

});