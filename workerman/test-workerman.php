<?php
require_once './vendor/autoload.php';

use Workerman\Worker;

// #### http worker ####
$http_worker = new Worker("http://0.0.0.0:1337");

// 4 processes
$http_worker->count = 4;

$counter = 0;
$div = 1;

// Emitted when request received
$http_worker->onMessage = function($connection, $data)
{
    global $counter, $div;
    $counter++;
    if ($counter == $div*10) {
        $div = $div*10;
    }
    if ($counter % $div == 0) {
        echo $counter."\n";
    }
    // send data to client
    $connection->send("OK");
};

// run all workers
Worker::runAll();