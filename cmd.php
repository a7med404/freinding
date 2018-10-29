<?php
$result = exec('php artisan route:list', $output, $returnVar);
echo '<pre>';
print_r($output);
echo '<hr>';
print_r($result);
echo '<hr>';
print_r($returnVar);
echo '</pre>';