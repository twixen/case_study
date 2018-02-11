<?php
require __DIR__  . '/../src/SplClassLoader.php';

$oClassLoader = new \SplClassLoader('Lpp', __DIR__ . '/../src');
$oClassLoader->register();
