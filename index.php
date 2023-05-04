<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php $filter = $_GET['add_filter'];?>

  

    <form action="index.php" method="GET" class="mt-3">
        <label for="filter">aggiungi filtro:</label>
        <select name="add_filter" id="filter">
            <option value="all">tutti</option>
            <option value="parking">parcheggio</option>
            <option value="vote">voto>3</option>
            <option value="parking_vote">parcheggio && voto</option>
        </select>
        <button type="submit">invia</button>

    </form>


    <table class="table mt-5">

        <thead>
            <tr>
                <th scope="col">#</th>
                <?php foreach ($hotels[0] as $key => $hotel) { ?>
                    <th scope="col"><?php echo $key ?></th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($hotels as $key => $hotel) {
                if ($filter == 'vote' && $hotel['vote'] > 3) { ?> 
                    <tr>
                        <th scope="row"><?php echo $key ?></th>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <?php if (($hotel['parking']) === true) { ?>
                            <td>parcheggio: SI</td>

                        <?php } else { ?>
                            <td>parcheggio:NO</td>
                        <?php } ?>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] ?></td>
                    </tr>

                <?php } elseif ($filter == 'parking' && $hotel['parking'] === true) { ?>

                    <tr>
                        <th scope="row"><?php echo $key ?></th>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <?php if (($hotel['parking']) === true) { ?>
                            <td>parcheggio: SI</td>

                        <?php } else { ?>
                            <td>parcheggio:NO</td>
                        <?php } ?>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] ?></td>
                    </tr>

                <?php } elseif (($filter == 'parking_vote' && $hotel['parking'] === true && $hotel['vote'] > 3)) { ?>

                    <tr>
                        <th scope="row"><?php echo $key ?></th>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <?php if (($hotel['parking']) === true) { ?>
                            <td>parcheggio: SI</td>

                        <?php } else { ?>
                            <td>parcheggio:NO</td>
                        <?php } ?>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] ?></td>
                    </tr>

                <?php } elseif($filter==='all')  {?>
                    <tr>
                        <th scope="row"><?php echo $key ?></th>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <?php if (($hotel['parking']) === true) { ?>
                            <td>parcheggio: SI</td>

                        <?php } else { ?>
                            <td>parcheggio:NO</td>
                        <?php } ?>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] ?></td>
                    </tr>
               <?php }
                ?>


            <?php } ?>


        </tbody>




    </table>




</body>

</html>