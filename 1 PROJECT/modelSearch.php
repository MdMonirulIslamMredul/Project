<?php

require_once "model/db_connect.php";

$str = $_GET['q'];
    $conn = db_conn();
    // $selectQuery = "SELECT * FROM editor WHERE name LIKE '%{$str}%' ";
    $selectQuery = "SELECT * FROM `products` WHERE Name LIKE '%{$str}%' ";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo '<table>';
    // echo '<thead>';

    //     echo '<td>Name</td>';
    //     echo '<td>BuyingPrice</td>';
    //     echo '</thead>';
    //     echo '<tbody>';
echo '</tr>';
if (is_array($row) || is_object($row))
{
    
    foreach ($row as $i) {



        echo '<tr>';
        echo '<td>'.$i["Name"].'</td>';
        echo '<br>';

        echo '<td>' .$i["BuyingPrice"].'</td>';
         
        echo '</br>';
     }

}
                    
echo '</tbody>';
echo '</table>';



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>



    <td><a href="showProduct.php?id=<?php echo $product['PID'] ?>"><?php echo $i["Name"] ?></a></td>


</body>
</html>