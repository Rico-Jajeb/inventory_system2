<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black_Jack</title>
</head>
<body>
    <h1 class="text-center mt-3">Black Jack</h1>

<div  class="container-fluid d-flex flex-column  ">
    <div class="">
        <h3 class="text-center">Banker</h3>
    </div>
    <div class="m-auto">
        <div class="card_cont2">
            <div class="black_card2">
                <!-- <h4 class="text-center mt-3 text-danger"><?php echo $cd1 ?></h4> -->
            </div>
            <div class="black_card2">2</div>
            <div class="black_card2">3</div>
            <div class="black_card2">4</div>
        </div>
    </div>
</div>

<hr>
<hr>

<div class="container-fluid d-flex justify-content-center mt-3 mb-5">
    <div class="m-auto">
        <div class="card_cont">
            <!-- <div class="black_card"><?php echo $cd1 ?><?php echo $rd ?> </div> -->
            <?php foreach($result as $row) {?>
                <div class="black_card d-flex justify-content-center align-items-center"> <h3 class="text-danger"><?php echo $row['card1'] ?></h3></div>
                <div class="black_card d-flex justify-content-center align-items-center"> <h3 class="text-danger "><?php echo $row['card2'] ?></h3></div>
                
                <?php 
                    
                    $card_values = $row['card1'] = "A";
                    $val = $card_values = 10;

                    // $valc = $row['card1'] + $row['card2'];
                ?>

                <?php if ($row['card1'] == 'A') { ?>
                    <div class="">result: 10 or A</div>
                    <?php echo $val ?>
                <?php } else { ?>
                    
                <?php } ?>




            <?php }?>



      
            <!-- <div class="black_card">3</div> -->
        </div>
        <form action="<?php echo base_url('index.php/bet') ?>" method="POST" class="mt-3">
            <h3>Player 1</h3>
            <label for="cars">BET : $</label>
            <select name="bet" id="cars">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
            <button class="d-block" type="submit">BET</button>
        </form>

        <div class="d-flex gap-1 mt-4">
            <form action="">
                <button>HIT</button>
            </form> 
            <form action="">
                <button>STAND</button>
            </form> 
            <form action="">
                <button>DOUBLE</button>
            </form> 
            <form action="">
                <button>SPLIT</button>
            </form> 
        </div>

        
    </div>
</div>

</body>
</html>