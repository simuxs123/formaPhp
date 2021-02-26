<?php include('inc/functions.php');
$data=showData();

$ticketData = $data[$_GET['btn']];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">

    <div class="ticket-box">
        <div class="left-side ">
            <h2>DELTA</h2>
            <div class="info-position">
                <h5><?= $ticketData['name']?>/<?= $ticketData['surname']?></h5>
                <h6>Flight nr: <?=$ticketData['flight']?></h6>
            </div>
            <div class="info-position">
                <h6>ID: <?=$ticketData['code']?></h6>
                <h6>From:<?=$ticketData['from']?></h6>
                <h6>To:<?=$ticketData['to']?></h6>
            </div>
            <div class="info-position left">
                <h6>Price: <?= $ticketData['price'] ?> $</h6>
                <h6>Baggage: <?=$ticketData['baggage']?>Kg</h6>
            </div>
            <div class="info-position left">
                <h6>Note:</h6>
                <p><?=$ticketData['note']?></p>
            </div>
        </div>
        <div class="right-side">
            <h2>ECONOMY</h2>
            <h5>Gate: E31</h5>
            <h5>Seat: 5E</h5>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
