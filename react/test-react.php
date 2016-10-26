<?php
$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);

$http = new React\Http\Server($socket);
$counter = 0;
$div = 1;
$http->on('request', function ($request, $response) {
    $response->writeHead(200, array('Content-Type' => 'text/plain'));
    global $counter, $div;
    $counter++;
    if ($counter == $div*10) {
        $div = $div*10;
    }
    if ($counter % $div == 0) {
        echo $counter."\n";
    }
    $response->end("OK");
});

$socket->listen(1337);
$loop->run();