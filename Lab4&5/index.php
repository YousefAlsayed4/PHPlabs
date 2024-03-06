<?php
require_once("vendor/autoload.php");


$con= new mainProgram();
$fields=["id","PRODUCT_code","Photo"];
$items= array();

$page=isset($_GET["page"]) ? $_GET["page"] :0;


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["click"])) {
    if ($_GET["click"] == "Prev") {
        if($page>0) $page =0;
    } elseif ($_GET["click"] == "Next") {

        $page += 5;
    }
}
if($con->connect()){
   $items= $con->get_data($fields,$page);

}



if(($_SERVER["REQUEST_METHOD"]=="GET")&& isset($_GET["name_column"])&& isset($GET["name_column"])){
 echo $_GET["name_column"];
 echo $GET["value"];
 $items=$con->get_data_by_column($_GET["name_column"],$_GET["value"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Pagination</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #e53935; 
            color: white;
        }

        a {
            display: inline-block;
            padding: 10px;
            margin: 5px;
            background-color: #e53935; 
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #d32f2f; 
        }
    </style>
</head>
<body>
<h2>Search Items</h2>
    <form method="GET" action="">
        <label for="search">Search by Column:</label>
        <input type="text" id="search" name="search" required>
        <input type="submit" value="Search">
    </form>
    <?php
    if (isset($search_results) && count($search_results) > 0) {
        echo '<h3>Search Results:</h3>';
        echo '<table border="1">';
        foreach ($search_results as $result) {
            echo '<tr>';
            echo '<td>' . $result->id . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } elseif (isset($search_results) && count($search_results) === 0) {
        echo '<p>No results found.</p>';
    }

    if(count($items)> 0){
        echo '<table>';
        echo '<tr>';
        
        foreach ($fields as $field){
            echo '<th>' . $field . '</th>';
        }
        echo '</tr>';
        
        foreach ($items as $item) {
            echo '<tr>';
            foreach ($fields as $field) {
                echo '<td>' . $item->$field . '</td>';
            }
        
            echo '<td>' . "<a href='getglasses.php/?id=$item->id'>" . "more" . "</a>" . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
        
        echo "<a style='margin-right:10px' href='?click=Prev&page='>" . "Prev" . "</a>";
        echo "<a href='?click=Next'>" . "Next" . "</a>";
        }
        $con->disconnect();
    ?>
</body>
</html>

