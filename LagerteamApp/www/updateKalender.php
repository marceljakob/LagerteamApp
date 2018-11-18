<?php

    $myFile = "json/events.json";
    $arr_data = array(); // create empty array

    $title = $_POST['eventTitle'];
    $start = $_POST['eventStart'];
    $end = $_POST['eventEnde'];

    try{
        //Get form data
        $formdata = array(
            'title'=> $title,
            'start'=> $start,
            'end'=> $end
    );

    //Get data from existing json file
    $jsondata = file_get_contents($myFile);

    // converts json data into array
    $arr_data = json_decode($jsondata, true);

    // Push user data to array
    array_push($arr_data,$formdata);

    //Convert updated array to JSON
    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

    //write json data into data.json file
    if(file_put_contents($myFile, $jsondata)) {
        echo 'Data successfully saved';
        header("Location: intern.php");
    }
    else
        echo "error";

    }
    catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

?>
