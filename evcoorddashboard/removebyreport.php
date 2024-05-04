<?php
session_start();

$idToRemove = $_COOKIE['idToRemove'];

// Read the current data from location.json
$json_file = file_get_contents('../location.json');
$datas = json_decode($json_file, true);

// Iterate over the array and remove entries with the specified ID
$filteredDatas = array_filter($datas, function ($location) use ($idToRemove) {
    return $location['id'] !== $idToRemove;
});

// Write the updated data to location.json
$json_data = json_encode(array_values($filteredDatas), JSON_PRETTY_PRINT);
file_put_contents('../location.json', $json_data);




// Assuming you have the JSON data stored in a variable called $jsonData
$jsonData = file_get_contents('../signupdetails.json');// Replace '...' with the actual JSON data
$data = json_decode($jsonData, true);

// Check if the JSON data was successfully decoded
if ($data !== null) {
    // Iterate over each dataset
    foreach ($data as &$dataset) {
        // Check if the dataset has the 'reports' attribute
        if (isset($dataset['reports'])) {


            // Check if the 'reports' attribute is an array
            if (is_array($dataset['reports'])) {
                // Iterate over the reports array
                foreach ($dataset['reports'] as &$report) {
                    if ($report['pointId'] === $idToRemove) {
                        // Add a notification indicating there is a report with the matching pointId
                        if (!isset($dataset['notifications'])) {
                            $dataset['notifications'] = [];
                        }

                        $dataset['notifications'][] = [
                            'notification' => 'Removed the chargepoint you have reported ' . $idToRemove,
                            'date' => date('Y-m-d') // Add the current date as the notification date
                        ];
                        break; // Exit the loop once a match is found (assuming there is only one report with the given pointId)
                    }
                }
            } else {
                echo "Invalid JSON data: reports attribute is not an array.";
            }
        }
    }

    // Convert the updated data back to JSON format
    $updatedJsonData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('../signupdetails.json', $updatedJsonData);

} else {
    echo "Failed to decode JSON data.";
}

?>









