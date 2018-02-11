<?php

//require __DIR__ . '/src/SplClassLoader.php';
//
//$classLoader = new SplClassLoader('Lpp', 'src');
//$classLoader->register();
use Lpp\Service\OrderedBrandService;
use Lpp\Service\UnorderedBrandService;
use Lpp\Service\ItemService;

define('DATA_SRC', 'data');
require __DIR__ . '/vendor/autoload.php';

$unordered = new UnorderedBrandService(new ItemService());
$unordered_collection = $unordered->getBrandsForCollection('winter');
echo '<pre>' . print_r($unordered_collection, true) . '</pre>';

$ordered = new OrderedBrandService(new ItemService());
$ordered_collection = $ordered->getBrandsForCollection('winter');
echo '<pre>' . print_r($ordered_collection, true) . '</pre>';
