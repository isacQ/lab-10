<?php
    $servername = "localhost";
    $username = "bilguun";
    $password = "e@UcUNp/d52r9l!g";
    $dbname = "house";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn-> connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['search']))
    {
        $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);

        $sql = "SELECT * FROM items WHERE item_name LIKE '%$searchTerm%'";

        $result = $conn->query($sql); 

        if($result->num_rows > 0)
        {
            $data = array();

            while($row = $result->fetch_assoc())
            {
                $data[] = $row;
            }
           
            echo $json_data = json_encode($data, JSON_PRETTY_PRINT);

        } else{
            echo $json_data = json_encode(array('message' => 'Tiim Utga Alga'));
        }
    }else{
        echo $json_data = json_encode(array('message' => 'Haih Utgaa oruulj ogno uu!!'));
    }

    return $json_data;

    $conn -> close();
    ?>
