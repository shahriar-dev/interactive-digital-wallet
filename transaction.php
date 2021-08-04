<?php
require "dbConnect.php";
require "dbAdd.php";
$category = $_POST['category'];
$phoneNumber = $_POST['phoneNumber'];
$amount = $_POST['amount'];
$yes = true;
// if ($EmptyFieldCategory || $EmptyFieldAmount || $EmptyFieldCategory) {
//     if ($EmptyFieldCategory) {
//         echo $CategoryError;
//         return;
//     } elseif ($EmptyFieldAmount) {
//         echo $PhoneNumberError;
//         return;
//     } elseif ($EmptyFieldAmount) {
//         echo $AmountError;
//         return;
//     } else {
//         echo "Something is wrong! Try Again...";
//         return;
//     }
// } else {
// if ($category === 'default') {
//     $CategoryError = "You must provide category";
//     $yes = false;
// }
// if (empty($phoneNumber)) {
//     $PhoneNumberError = "You must provide recepint number!";
//     $yes = false;
// }
// if (empty($amount)) {
//     $AmountError = "You must give an AMOUNT!";
//     $yes = false;
// }

// if ($yes) {
//     insertTransaction($category, $phoneNumber, $amount);
//     echo "Successful!";
// } else {
//     echo "Unsuccessful";
// }
if (insertTransaction($category, $phoneNumber, $amount)) {
    echo "Successful!";
}
