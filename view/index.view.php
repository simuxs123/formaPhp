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
    <?php if(isset($_POST['send']) ){
            $validation=validate($_POST);
        };
    ?>
        <?php
        if(isset($_POST['send']) && empty(implode("",$validation)) ):?>
            <div class="ticket-box">
               <div class="left-side ">
                   <h2>DELTA</h2>
                   <div class="info-position">
                       <h5><?= htmlspecialchars($_POST['name'])?>/<?= htmlspecialchars($_POST['surname'])?></h5>
                       <h6>Flight nr: <?=$_POST['flight']?></h6>
                   </div>
                   <div class="info-position">
                       <h6>ID: <?=$_POST['code']?></h6>
                       <h6>From:<?=check($_POST)?></h6>
                       <h6>To:<?=check($_POST)?></h6>
                   </div>
                   <div class="info-position left">
                       <h6>Price: <?= price($_POST) ?> $</h6>
                       <h6>Baggage: <?=$_POST['baggage']?>Kg</h6>
                   </div>
                   <div class="info-position left">
                       <h6>Note:</h6>
                       <p><?=htmlspecialchars($_POST['note'])?></p>
                   </div>
               </div>
                <div class="right-side">
                    <h2>ECONOMY</h2>
                    <h5>Gate: E31</h5>
                    <h5>Seat: 5E</h5>
                </div>

            </div>
        <?php endif;?>

    <form method="post">
        <div class="mb-3">
            <select class="form-control" name="flight">
                <option selected disabled>Flight nr.</option>
                <?php foreach ($flightNr as $flight):?>
                    <option value="<?=$flight?>"><?=$flight?></option>
                <?php endforeach;?>
            </select>
            <small class="err"><?=$validation['flight']?></small>
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Personal code</label>
            <input type="text" name="code" class="form-control" id="code" placeholder="2344546567">
            <small class="err"><?=$validation['code']?></small>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Jonas">
            <small class="err"><?=$validation['name']?></small>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" name="surname" class="form-control" id="surname" placeholder="Jonaitis">
            <small class="err"><?=$validation['surname']?></small>
        </div>
        <div class="mb-3">
            <select class="form-control" name="from">
                <option selected disabled>From:</option>
                <?php foreach ($from as $countrie):?>
                    <option value="<?=$countrie?>"><?=$countrie?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-3">
            <select class="form-control" name="to">
                <option selected disabled>To:</option>
                <?php foreach ($to as $countrie):?>
                    <option value="<?=$countrie?>"><?=$countrie?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" class="form-control" id="price" placeholder="20">
        </div>
        <div class="mb-3">
            <select class="form-control" name="baggage">
                <option selected disabled>Baggage</option>
                <?php foreach ($baggage as $weight):?>
                    <option value="<?=$weight?>"><?=$weight?></option>
                <?php endforeach;?>
            </select>
            <small class="err"><?=$validation['baggage']?></small>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control" name="note" id="note" rows="3"></textarea>
            <small class="err"><?=$validation['note']?></small>
        </div>
        <button type="submit" name="send" class="btn btn-primary">Print</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
