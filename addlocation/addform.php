<!DOCTYPE html>
<html>
<head>
    <title>Add Location</title>
    <link rel="stylesheet" href="map.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
</head>
<body>
    <h2></h2>
    <div id="map"></div>
    <div class="text">
        <form method="POST" action="" class="form" onsubmit="enableNextButton()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="state">State:</label>
            <input type="text" id="state" name="state" required><br>
            <label for="latitude">Latitude:</label>
            <input id="latitude" type="text" name="latitude" placeholder="latitude"><br>
            <label for="longitude">Longitude:</label>
            <input id="longitude" type="text" name="longitude" placeholder="longitude"><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br>
           
            <input type="submit" value="Next">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $state = $_POST['state'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $address = $_POST['address'];
        
            
            if ($name != NULL) {
                $data = file_exists('data.json') && filesize('data.json') > 0 ? json_decode(file_get_contents('data.json'), true) : [];

                $newData = array(
                    'name' => $name,
                    'state' => $state,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'address' => $address,
                    
                );

                array_push($data, $newData);

                $json = json_encode($data, JSON_PRETTY_PRINT);

                file_put_contents('data.json', $json);

                echo '<p>Data added successfully!</p>';

                header('Location: ct.php');
                exit();
            }
        }
        ?>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src="script.js"></script>
</body>
</html>