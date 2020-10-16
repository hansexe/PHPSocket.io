<?php

use Workerman\Worker;
use Workerman\WebServer;
use Workerman\Autoloader;
use PHPSocketIO\SocketIO;

require 'O:\SOCKETS\DENUEVOPHPIO\phpsocket.io\vendor\autoload.php';

$io = new SocketIO(3120);

$io->on('connection', function($socket)use($io){
  echo "new connection coming\n";
  $io->emit('chat message', "funciona pelada");
});


Worker::runAll();