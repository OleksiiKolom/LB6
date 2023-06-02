<?php
include("connect.php");

$endDate = $_POST["CostOfRent"];
$collections = (new MongoDB\Client)->Lb6_Var6->rent;
$filter = ['endDate' => $endDate];
$projection = ['CostOfRent' => 1];
$cursor = $collections->find($filter, $projection);

$result = array();
foreach ($cursor as $document) {
    $result[] = $document['cost'];
    $unique_costs = array_unique($result);
foreach ($unique_costs as $cost) {
        echo $cost . "<br>";
}
}

echo "<script>localStorage.setItem('request', '" . json_encode($result)."'); </script>";
?>
