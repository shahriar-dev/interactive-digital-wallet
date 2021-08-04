<?php
$TotalRecords = "";
$TransactionCategory = "";
$Amount = "";
$To = "";
$TransferredOn = "";

define("filepath", "data.txt");
$retrievedData = json_decode(file_get_contents(filepath));
$TotalRecords = count($retrievedData);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
</head>

<body>
    <h1>Page 2 [Transaction History]</h1>
    <h3>Digital Wallet</h3>

    <span>
        <table>
            <style>
                td {
                    padding-right: 20px;
                }
            </style>
            <tr>
                <td><a href="home.php">1. Home</a></td>
                <td><a href="transaction-history.php">2. Transaction History</a></td>
            </tr>
        </table>
    </span>

    <div>
        <input type="date" name="input_date" id="input_date" value="" min="1997-01-01" max="2030-12-31">
        <input type="time" name="input_time" id="input_time">
        <button type="submit" onclick="search();">Search</button>
    </div>

    <div id="search-result">

    </div>

    <script src="transaction-history.js"></script>
</body>

</html>