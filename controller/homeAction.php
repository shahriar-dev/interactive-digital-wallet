<?php
require "./../model/homeVariable.php";

$EmptyFieldCategory = false;
$EmptyFieldPhoneNumber = false;
$EmptyFieldAmount = false;
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
        } else {
            $Amount = Test_User_Input($_POST["amount"]);
            if (!preg_match("/^-?[0-9]+(?:\.[0-9]{1,2})?$/", $Amount) || (int)$Amount < (int)"0") {
                $EmptyFieldAmount = true;
                $AmountError = "Must be > 0!";
                $EmptyField = true;
            }
        }
        if (empty($_POST["phoneNumber"])) {
            $PhoneNumberError = "You must enter a PHONE NUMBER!";

            $EmptyField = true;
        } else {
            $PhoneNumber = Test_User_Input($_POST["phoneNumber"]);
            $Type2 = preg_match("/^[0-9]{11}+$/", $PhoneNumber);
            if (!$Type2) {
                $PhoneNumberError = "Must be valid BANGLADESHI NUMBER!";
                $EmptyFieldPhoneNumber = false;
                $EmptyField = true;
            }
        }
    }
}
function Test_User_Input($Data)
{
    return trim(htmlspecialchars(stripcslashes($Data)));
}
