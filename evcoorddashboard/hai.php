<?php
// Read the contents of location.json
$locationData = file_get_contents('../location.json');
$location = json_decode($locationData, true);

// Check if the location array is not empty
if (!empty($location)) {
    // Get the last dataset's name
    $lastDataset = end($location);
    $lastDatasetName = $lastDataset['id'];

    // Output the name of the last dataset
    echo "Name of the last dataset: " . $lastDatasetName;
} else {
    echo "No datasets found in location.json";
}
?>
