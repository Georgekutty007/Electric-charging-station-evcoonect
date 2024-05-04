<?php
// Read the contents of the JSON file
$json = file_get_contents('plugs.json');

// Decode the JSON data into a PHP array
$data = json_decode($json, true);

// Initialize an empty array to store the plug names
$plug_names = array();

// Loop through each plug and add its name to the array
foreach ($data['plugs'] as $plug) {
    if (isset($plug['name'])) {
        $plug_names[] = $plug['name'];
    }
}


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the selected plug from the form
    $selected_plug = $_POST['plug'];
    
    // Redirect to the validation page with the selected plug as a parameter
    header("Location: validation.php?plug=$selected_plug");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dropdown Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Select a Plug</h1>
    <p>Please select a plug from the dropdown menu:</p>
    <form method="POST">
        <select name="plug">
            <?php
                // Loop through each plug name and create an option tag
                foreach ($plug_names as $name) {
                    echo "<option value='$name'>$name</option>";
                }
            ?>
        </select>
        <br>
        <label for="ownerName">Owner Name:</label>
        <input type="text" id="ownerName" name="ownerName" required>
        <br>
        <label for="ownerNumber">Owner Number:</label>
        <input type="text" id="ownerNumber" name="ownerNumber" required><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
		