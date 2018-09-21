<?php
use Workerman\Worker;

require_once __DIR__. '/Autoloader.php';
$worker = new Worker('ws://0.0.0.0:2346');
$worker->count = 4;

$worker->onConnect = function ($connection) {
    echo "It is a new connection\n";
};

$worker->onMessage = function ($connection, $data) {
    print_r($data);
    $connection->send('I got your message!');
};

$worker->onClose = function () {
    echo "connection closed\n";
};

Worker::runAll();