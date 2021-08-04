<?php
require "./../model/homeVariable.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Digital Wallet</title>
    <style>
        table,
        th,
        tr,
        td {
            border: 1px solid black;
        }

        .link {
            padding-bottom: 20px;
        }

        a {
            padding-right: 10px;
        }
    </style>
</head>

<body>
    <h1>Page 1 [Home]</h1>
    <h3>Digital Wallet</h3>
    <div class="link">
        <a href="home.php">1. Home</a>
        <a href="transaction-history.php">2. Transaction History</a>
    </div>

    <h3>Fund Transfer</h3>
    <div>
        <form method="POST" action="./controller/transaction.php" onsubmit="isValid(); return false;">
            <span>
                <label for="selected_category">Select Catergory:</label>

                <select name="transaction_method" id="selected_category" value="">
                    <option disabled selected default value="default">--Choose a Category--</option>
                    <option id="sendMoney" <?php if (isset($_POST['transaction_method']) && $_POST['transaction_method'] == 'sendMoney') echo 'selected'; ?> value="sendMoney">Send Money</option>
                    <option id="rechargeMoney" <?php if (isset($_POST['transaction_method']) && $_POST['transaction_method'] == 'rechargeMoney') echo 'selected'; ?> value="rechargeMoney">Recharge</option>
                    <option id="merchantPay" <?php if (isset($_POST['transaction_method']) && $_POST['transaction_method'] == 'merchantPay') echo 'selected'; ?> value="merchentPay">Merchent Pay</option>
                </select>
                <label for="error_inputCategory" style="color: red;" id="error_inputCategory"><?php echo "<b>$CategoryError</b>" ?></label>
            </span>

            <span>
                <br>
                <br>
                <label for="input_phone">To: </label>
                <input type="text" id="input_phone" name="phoneNumber" value="<?php echo $PhoneNumber; ?>">
                <label for="error_inputPhone" id="error_inputPhoneNumber" style="color: red;"><?php echo "<b>$PhoneNumberError</b>" ?></label>
            </span>
            <span>
                <br>
                <br>
                <label for="input_amount">Amount: </label>
                <input type="text" id="input_amount" name="amount" value="<?php echo $Amount; ?>">
                <label for="error_inputAmmount" id="error_inputAmount" style="color: red;"><?php echo "<b>$AmountError</b>" ?></label>
            </span>



            <span>
                <br><br>
                <button type="submit" name="submit">Submit</button>&nbsp;&nbsp;
            </span>
        </form>

        <div id="result">

        </div>
    </div>

    <script type="text/javascript" src="./js/homeValidation.js"></script>
</body>

</html>