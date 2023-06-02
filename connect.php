<?php
require_once(__DIR__."/vendor/autoload.php");

$client = new MongoDB\Client;
$collections = $client->Lb6_Var6->rent;
$collections = $client->Lb6_Var6->cars;
