//  all the ajax and async operations here
function getTarget(e) {
    if(!e) {
        e = window.event;
    }
    return e.target || e.srcElement;
}

//  function to create XHR request
function createXHR() {
    if(XMLHttpRequest) {
        return new XMLHttpRequest();
    }else{
        return new ActiveXObject("Microsoft.XMLHTTP");  // fallback code for IE-8 and below
    }
}

//  function to delete the product from the database
function deleteProduct(productId, parentColumn, childColumn) {
    let xhr = createXHR();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            if(xhr.responseText === "true" || xhr.responseText === true || xhr.responseText == true){
                parentColumn.removeChild(childColumn);
                setTimeout(() => {
                    alert("Product has been deleted");
                }, 500);
            }
        }
    }
    
    xhr.open("POST", "ajax/delete_product.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id="+productId);
}

//  code block for deletion of the products by the lender
if(window.addEventListener) {
    window.addEventListener('load', function() {
        //  code to delete the products of the lender asynchronously 
        let area = document.getElementsByClassName('products')[0];
        let product_id;
        if(area) {
            area.addEventListener('click', function(e) {
                let tar = getTarget(e);
                if(tar.className === 'del-product') {
                    product_id = tar.parentNode.getAttribute('id');
                    let parentCol = tar.parentNode.parentNode.parentNode.parentNode; 
                    let childCol = tar.parentNode.parentNode.parentNode;
                    deleteProduct(product_id, parentCol, childCol);
                }
            }, false);
        }
    }, false);
}

/**
 * CODE BLOCK below is to reset the password when a lender forgets his or her password.
 */
function sendForgotEmail(email, button = null) {
    let xhr = createXHR();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
        }
    }
    xhr.onloadstart = function() {
        button.textContent = "Sending mail";
    }
    xhr.onloadend = function() {
        document.getElementById('forgot-email').value = "";
        button.textContent = "SEND MAIL";
        document.getElementById('email-message').textContent = "The mail has been sent";
        setTimeout(() => {
            document.getElementById('email-message').textContent = "";
        }, 3000);
    }
    xhr.open("GET", "../ajax/send_forgot_password_email.php?email="+email, true);
    xhr.send();
}

if(window.addEventListener) {
    window.addEventListener('load', function(){
        let resetbutton = document.getElementById('forgot');
        let overlay = document.querySelector("div.overlay");
        if(resetbutton) {
            resetbutton.addEventListener('click', function() {
                overlay.style.display = "block";
            }, false);
        }

        let close = document.getElementById('close-overlay');
        if(close) {
            close.onclick = function() {overlay.style.display = "none";}
        }

        let emailAddres = document.getElementById('forgot-email');
        let sendButton = document.getElementById('send-forgot-email');
        if(sendButton) {
            sendButton.addEventListener('click', function() {
                let reg = /^([a-zA-Z0-9\.\-_])+\@+([a-zA-Z0-9\.\-_])+\.+([a-zA-Z0-9]{2,4})$/;
                if(reg.test(emailAddres.value)){
                    //  code to send the email address
                    sendForgotEmail(emailAddres.value, sendButton);
                }else{
                    //  message displaying the error
                    document.getElementById('email-message-warning').textContent = "Enter a valid email address";
                    setTimeout(() => {
                        document.getElementById('email-message-warning').textContent = "";
                    }, 3000);
                }
            }, false);
        }

    }, false);
}