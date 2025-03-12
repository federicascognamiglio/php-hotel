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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Script Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP Hotel</title>
</head>

<body>

    <div class="container">

        <!-- Titke -->
        <h1 class="mt-5 mb-5">Hotels</h1>

        <!-- Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <?php 

                    // Stampo le chiavi dell'array associativo come intestazioni della tabella
                    forEach($hotels[0] as $key => $value) {
                        echo "<th scope='col'>$key</th>";
                    }

                ?>
                </tr>
            </thead>
            <tbody>
                <?php

                    // Stampo i valori dell'array associativo come righe della tabella
                    forEach($hotels as $curHotel) {
                        echo "<tr>";
                        forEach($curHotel as $key => $value) {

                            if($key == 'parking') {
                                $value = $value ? 'Yes' : 'No';
                            }

                            if ($key == 'distance_to_center') {
                                $value = $value . ' km';
                            }
                            
                            echo "<td>$value</td>";

                        };
                    }

                ?>
            </tbody>
        </table>
        <!-- /Table -->
    </div>
</body>

</html>