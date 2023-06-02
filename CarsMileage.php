<?php
include("connect.php");

$mileage = $_POST["carBrands"];
$collections = (new MongoDB\Client)->Lb6_Var6->cars;
$filter = ['mileage' => ['$lt' => $mileage]];
$projection = ['carBrands' => 1];
$cursor = $collections->find($filter, $projection);

$result = array();
foreach ($cursor as $document) {
    foreach ($document['carBrands'] as $carBrand) {
        $result[] = $carBrand;
    }
    
}
$unique_carBrands = array_unique($result);
foreach ($unique_carBrands as $carBrand) {
    echo $carBrand. "<br>";
}
echo "<script>localStorage.setItem('request', '" . json_encode($result) . "'); </script>";
?>
