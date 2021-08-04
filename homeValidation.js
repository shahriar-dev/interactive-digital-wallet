const category = document.getElementById('selected_category');
const phoneNumber = document.getElementById('input_phone');
const amount = document.getElementById('input_amount');

const catergoryError = document.getElementById('error_inputCategory');
const phoneNumberError = document.getElementById('error_inputPhoneNumber');
const amountError = document.getElementById('error_inputAmount');

var flag = true;

function calculatestore() {
    // var xhttp = new XMLHttpRequest();
    // console.log("Asdas");
    
    // xhttp.open('POST', "transaction.php");
    // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // console.log(120);
    // xhttp.onload = function() {    
    //     if(this.status === 200) {
            
    //         document.getElementById('result').innerHTML = this.responseText;
    //     }

        
    //     xhttp.send("category=" + category.options[category.selectedIndex].value + "&phoneNumber="+ phoneNumber.value + "&amount=" + amount.value);
    // }
}


function isValid() {
    var inputPhone = checkPhoneNumber();
    var inputAmount = checkAmount();
    var inputCategory = checkCaterogry();
    console.log(inputAmount);
    console.log(inputPhone);
    console.log(inputCategory);
    if(inputPhone && inputCategory &&  inputAmount) {
        console.log(1);
        var xhttp = new XMLHttpRequest();
        console.log("Asdas");
        console.log(120);
        xhttp.onload = function() {    
            if(this.status === 200) {
                
                document.getElementById('result').innerHTML = this.responseText;
            }               
        }
        xhttp.open('POST', "transaction.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("category=" + category.options[category.selectedIndex].value + "&phoneNumber="+ phoneNumber.value + "&amount=" + amount.value);
    }
}


function checkCaterogry() {
    if(category.options[category.selectedIndex].value === 'default') {
        catergoryError.innerHTML = "Please Select a category";
        return false;
    } else {
        catergoryError.innerHTML = '';
        return true;
    }
}

function checkPhoneNumber() {
    console.log(phoneNumber.value);
    if(phoneNumber.value != '') {
        if(validatePhoneNumber(phoneNumber.value)) {
            phoneNumberError.innerHTML = '';
            return true;
        } else {
            phoneNumberError.innerHTML = "Please enter a valid Phone Number!";
            return false;
        }
    } else {
        phoneNumberError.innerHTML = 'Please Enter a Phone Number!';
        return false;
    }

}

function checkAmount() {

    if(amount.value != '') {
        if(amount.value > 0) {
            amountError.innerHTML = '';
            return true;
        } else{
            amountError.innerHTML = "Must be > 0!";
            return false;
        }
    } else {
        amountError.innerHTML = 'You must enter a amount!';
        return false;
    }
}

function validatePhoneNumber(phone) {
    var regex1 = /^\+?(88)([0-9]{11})$/
    var regex1 = /^(01)([0-9]{9})$/

    if(regex1.test(phone) || regex2.test(phone)) {
        return true;
    } return false;
}

function validateAmount(a) {
    var regex = /^[0-9]*$/;

    return regex.text(a);
}