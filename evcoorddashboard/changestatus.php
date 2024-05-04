<?php


$id = $_COOKIE['idToRemove'];

// Read the current favorites for the user from signup.json
$json_file = file_get_contents('../location.json');
$datas = json_decode($json_file, true);

// Check if the user exists in signup.json
$user_exists = false;
foreach ($datas as &$item) {
    if ($item['id'] == $id) {
        $user_exists = true;
        // If the user already has 'favorites' attribute, add the id to it
        if (isset($item['status'])) {
            if($item['status'] == 1){
                $item['status'] = 0;
            }
            else{
                $item['status'] = 1;
            }

        // If the user doesn't have 'favorites' attribute, create it and add the id
        } else {
            if($item['status'] == 1){
                $item['status'] = 0;
            }
            else{
                $item['status'] = 1;
            }
        }
        break;
    }
}

// Write the updated data to signup.json
$json_data = json_encode($datas,JSON_PRETTY_PRINT);
file_put_contents('../location.json', $json_data);

?>