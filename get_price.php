<?php
require 'conn.php';

$searchTerm = $_GET['term'];
$sql = "SELECT * FROM cart WHERE name LIKE '%" . $searchTerm . "%'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $tutorialData = array();
    while ($row = $result->fetch_assoc()) {

        $data['value'] = $row['name'];
        array_push($tutorialData, $data);
    }
}
echo json_encode($tutorialData);
?>