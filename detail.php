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

    if(isset($_GET['id']))
    {
        $searchID = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "SELECT * FROM items 
                JOIN categories c ON items.category_id = c.category_id
                JOIN uses u ON c.category_id = u.use_id
                WHERE item_id = $searchID ";

        $result = $conn->query($sql);

        if($result->num_rows > 0)
        {
            $data = array();

            while($row = $result->fetch_assoc())
            {
                $data[] = $row;
            }
           
           echo $json_data = json_encode($data, JSON_PRETTY_PRINT);

        } 
    
    }

    return $json_data;
    
    $conn -> close();
?>
