<?php
    // DATA
    // Array di hotel
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
    
    // Parametri query string
    $vote_param = isset($_GET["vote"]) && is_numeric($_GET["vote"]) && $_GET["vote"] >= 0 && $_GET["vote"] <= 5 ? (int)$_GET["vote"] : 0;
    $has_parking_param = isset($_GET["parking"]) && $_GET["parking"] == 'on' ? true : false;
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

        <!-- Title -->
        <h1 class="mt-5 mb-4">Hotels</h1>

        <!-- Form -->
        <form action="" method="GET">
            <div class="mb-3 w-25">
                <label for="vote" class="form-label">Vote</label>
                <input type="number" name="vote" class="form-control" id="vote" placeholder="ex.2" min="0" max="5">
            </div>
            <div class="d-flex align-items-center justify-content-between w-25 mb-5">
                <div class="form-check">
                    <input type="checkbox" name="parking" class="form-check-input" id="parking">
                    <label class="form-check-label" for="parking">Parking</label>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Filter</button>
            </div>
        </form>
        <!-- /Form -->

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
                            $showHotel = true;

                            // Controllo se il voto è maggiore di quello dell'hotel corrente
                            if ($curHotel["vote"] < $vote_param) {
                                $showHotel = false;
                            }
                            // Controllo se l'hotel corrente non ha il parcheggio
                            if($has_parking_param && !$curHotel["parking"]) {
                                $showHotel = false;
                            }

                            // Stampo la riga solo se $showHotel è true
                            if($showHotel) {
                                    echo "<tr>";
                                    forEach($curHotel as $key => $value) {
                
                                        if($key == 'parking') {
                                            $value = $value ? 'Yes' : 'No';
                                        }
                
                                        if ($key == 'distance_to_center') {
                                            $value = $value . ' km';
                                        }
                                        
                                        echo "<td>$value</td>";
                
                                    }
                            }
                    }
                ?>
            </tbody>
        </table>
        <!-- /Table -->
    </div>
</body>

</html>