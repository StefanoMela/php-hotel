<!-- 
    struttura base pagina => logicaPHP + html || solo logicaPHP ?
    logica di scrittura => tutto nel tag PHP || inline tipo v-for ?
    uso di una o due pagine => scrivo nell'html di php o su index.html ?
 -->


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

$data = $_GET;

$filters = !empty($data);

var_dump($filters);

$newArray = [];


// if (!$filters) {

//     $newArray = $hotels;
// } else {

//     foreach ($hotels as $hotel) {

//         if ($hotel['parking'] === true) {

//             $newArray[] = $hotel;
//             var_dump($newArray);
//         }
//     }
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- BS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer>
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotels</title>
</head>

<body>
    <div class="container py-5">
        <form method="GET">
            <select class="form-select" name="options" aria-label="Default select example">
                <option value="0" selected>Filtra per</option>
                <option value="1">Parcheggi</option>
                <option value="2">Stelle</option>
            </select>
            <div>
                <button type="submit" class="btn btn-primary mb-3">submit</button>
            </div>
        </form>
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($hotels as $key => $hotel) {
                    if (!$filters) {
                ?>
                        <tr>
                            <td><?php echo $hotel['name'] ?></td>
                            <td><?php echo $hotel['description'] ?></td>
                            <td>
                                <?php
                                if ($hotel['parking'] === true) {
                                    echo "Si";
                                } else {
                                    echo "No";
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $hotel['vote']  ?>
                            </td>
                            <td><?php echo $hotel['distance_to_center'] . " " . "Kilometri" ?></td>
                        </tr>
                <?php  } elseif ($filters === 1) { ?>
                    <?php 
                        foreach($hotels as $hotel) {
                            if ($hotel['parking'] === true) {
                             $newArray[] += $hotel;

                             var_dump($newArray);
                        }
                        ?>
                <?php  }}}?>
            </tbody>
        </table>
    </div>
</body>

</html>