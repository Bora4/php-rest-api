<?php

    header('Access-Control-Allow-Origin: *');
    include_once 'DoctorModel.php';
    include_once 'DBModel.php';

    $database = new Database();
    $db = $database->connect();

    $doc = new Doctor($db);

    $result = $doc->get_all();

    $num = $result -> rowCount();

    if($num>0) {

        $docs_arr = array();
        // $docs_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $doc_item = array(
                'id' => $id,
                'phonenumber' => $phonenumber,
                'name' => $name,
                'surname' => $surname,
                'specialty' => $specialty,
                'hospital' => $hospital
            );


            // array_push($docs_arr['data'], $doc_item);
            array_push($docs_arr, $doc_item);
        }

        echo json_encode($docs_arr);
    
    
    } else {

        echo json_encode(
            array('message' => 'No Docs Found')
        );

    }

?>