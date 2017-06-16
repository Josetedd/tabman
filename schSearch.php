<?php
//database configuration
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'tabman';
    
    //connect with the database
    $db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    $term = trim(strip_tags($_GET['term']));
    $sql="SELECT school FROM schools WHERE school LIKE '%{$term}%'";
    
    //get matched data from skills table
    $result = $db->query($sql);
    $array = array();
    while ($row = mysqli_fetch_array($result)) {
        $array["id"]=$row['school'];
        //$array["label"]=$row['school'];
        //$array["value"]=$row['school'];
        array_push($array, $row);
        
    }
       /* $array[] = array (
            'id' => $row['merchant'],
        );
    }
        * 
        */
    
    //return json data
    echo json_encode($array);
    flush();
    
?>

