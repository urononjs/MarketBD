<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'MarketBD');

if (mysqli_connect_errno()) {
    echo 'Connection error (' . mysqli_connect_errno() . '):' . mysqli_connect_error();
    exit();
}

$id = $_POST['id'];

if ($id == 0) {
    echo getFirstResult();
} else if ($id == 1) {
    echo getSecondResult();
} else if ($id == 2) {
    echo getThirdResult();
} else if ($id == 3) {
    echo getFourthResult();
}


function getFirstResult()
{

    global $connection;
    $result = mysqli_query($connection, 'SELECT * FROM `offers`');

    return json_encode(mysqli_fetch_all($result));
}


function getSecondResult()
{

    global $connection;
    $result = mysqli_query($connection, 'SELECT requests.id, (SELECT offers.name FROM offers 
WHERE offers.id = requests.offer_id) FROM requests');

    return json_encode(mysqli_fetch_all($result));

}


function getThirdResult()
{

    global $connection;
    $result = mysqli_query($connection, 'SELECT 
requests.id,
(SELECT offers.name FROM offers WHERE offers.id = requests.offer_id) offerName,
requests.price,
requests.count,
(SELECT operators.fio FROM operators WHERE operators.id = requests.operator_id) operatorFio
FROM requests
WHERE requests.count >2 AND requests.operator_id IN (10,12)');

    return json_encode(mysqli_fetch_all($result));

}


function getFourthResult()
{

    global $connection;
    $result = mysqli_query($connection, 'SELECT (SELECT offers.name 
FROM offers WHERE offers.id = requests.offer_id) offerName, SUM(requests.count) 
AS Count, SUM(requests.price) AS Price FROM requests GROUP BY offerName');

    return json_encode(mysqli_fetch_all($result));


}

