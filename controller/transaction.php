<?php
require "./../model/dbConnect.php";
require "./../model/dbAdd.php";
require "homeAction.php";

$set = true;

if (isset($_POST['category'])) {
    $category = $_POST['category'];
} else {
    $set = false;
}
if (isset($_POST['phoneNumber'])) {
    $phoneNumber = $_POST['phoneNumber'];
} else {
    $set = false;
}
if (isset($_POST['amount'])) {
    $amount = $_POST['amount'];
} else {
    $set = false;
}

if (!$set) {
    header("refresh:3; url=HTTP/1.1 404 Not Found");
    return;
} else {
    $yes = true;
    if ($EmptyFieldCategory || $EmptyFieldAmount || $EmptyFieldCategory) {
        if ($EmptyFieldCategory) {
            echo $CategoryError . "<br>";
            // return;
        }
        if ($EmptyFieldAmount) {
            echo $PhoneNumberError . "<br>";
            // return;
        }
        if ($EmptyFieldAmount) {
            echo $AmountError . "<br>";
            // return;
        }
    } else {
        if ($category === 'default') {
            $CategoryError = "You must provide category";
            $yes = false;
        }
        if (empty($phoneNumber)) {
            $PhoneNumberError = "You must provide recipient number!";
            $yes = false;
        }
        if (empty($amount)) {
            $AmountError = "You must give an AMOUNT!";
            $yes = false;
        }

        if ($yes) {
            if (insertTransaction($category, $phoneNumber, $amount)) {
                echo "Successful!";
            } else {
                echo "Unsuccessful";
            }
        }
    }
}
