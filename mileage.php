<?php
include("connect.php");

$mileage = $_POST["brands"];

$collections = (new MongoDB\Client)->Lb6_Var6->cars;

$filter = ['mileage' => ['$lt' => $mileage]];

$projection = ['brands' => 1];

$cursor = $collections->find($filter, $projection);

$result = array();
foreach ($cursor as $document) {
    foreach ($document['carBrands'] as $carBrand) {
        $result[] = $carBrand;
    }    
}


$unique_brands = array_unique($result);
foreach ($unique_brands as $carBrand) {
    echo $carBrand. "<br>";
}






echo "<script>localStorage.setItem('request', '" . json_encode($result) . "'); </script>";
?>
