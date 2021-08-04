<?php
function insertTransaction($category, $recipient, $amount)
{
    $date = date("Y-m-d", time());
    $time = date("h:i:sa");
    $connection = connect();

    $query = "INSERT INTO transaction_details (transaction_category, recipient, amount, date, time) VALUES (?, ?, ?, ?, ?)";
    $sql = $connection->prepare($query);

    $sql->bind_param("sssss", $category, $recipient, $amount, $date, $time);
    // $result = sql->execute();
    return $sql->execute();
}
