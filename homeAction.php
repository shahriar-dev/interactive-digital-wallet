<?php
require "homeVariable.php";

$EmptyFieldCategory = false;
$EmptyFieldPhoneNumber = false;
$EmptyFieldAmount = false;
// $Default = "Select a Value";
$EmptyField = false;
define("filepath", "data.txt");
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['submit'])) {

        if (empty($_POST["category"])) {
            $CategoryError = "Please SELECT a CATEGORY!";
            $EmptyFieldCategory = true;
            $EmptyField = true;
        }
        if (empty($_POST["amount"])) {
            $AmountError = "You must enter a amount!";
            $EmptyFieldAmount = true;
            $EmptyField = true;
        }
        if (empty($_POST["phoneNumber"])) {
            $PhoneNumberError = "You must enter a PHONE NUMBER!";
            $EmptyFieldPhoneNumber = true;
            $EmptyField = true;
        }

        checkPnA();
        // if ($CategoryType == "sendMoney") {
        //     checkPnA();
        // } else if ($CategoryType == "Recharge") {
        //     checkPnA();
        // } elseif ($CategoryType == "Merchent Pay") {
        //     checkPnA();
        // }

    //     if (!$EmptyField) {
    //         //$d = strtotime("today");

    //         header("refresh:5;url=home.php");
    //     } else {
    //         header("refresh:5;url:home.php");
    //         echo $CategoryError . "<br>";
    //         echo $AmountError . "<br>";
    //         echo $PhoneNumberError . "<br>";
    //         echo "You will be redirected in 5 seconds and if not then click <a href=home.php>HERE!</a>";
    //     }
    // }
}

function checkPnA()
{
    if (empty($_POST["phoneNumber"])) {
        $PhoneNumberError = "You must enter a PHONE NUMBER!";
        $EmptyField = true;
    } else {
        $PhoneNumber = Test_User_Input($_POST["phoneNumber"]);
        //$Type1 = preg_match("/^(\+8801)[0-9]{9}$/", $PhoneNumber);
        $Type2 = preg_match("/^[0-9]{11}+$/", $PhoneNumber);
        if (!$Type2) {
            $PhoneNumberError = "Must be valid BANGLADESHI NUMBER!";
            $EmptyField = true;
        }

        if (empty($_POST["amount"])) {
            $AmountError = "You must enter a PHONE NUMBER!";
            $EmptyField = true;
        } else {
            $Amount = Test_User_Input($_POST["amount"]);
            if (!preg_match("/^-?[0-9]+(?:\.[0-9]{1,2})?$/", $Amount) || (int)$Amount < (int)"0") {
                $AmountError = "Must be > 0!";
                $EmptyField = true;
            }
        }
    }
}
function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripcslashes($Data)));
}
}