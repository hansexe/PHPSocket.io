<?php
include __DIR__.'/../Event/Emitter.php';
ini_set('display_errors', 'on');
$emitter = new Event\Emitter;
$func = function($arg1, $arg2)
{
    var_dump($arg1, $arg2);
};
$emitter->on('removeListener', function($event_name, $func){echo $event_name,':',var_export($func, true),"removed\n";});
$emitter->on('newListener', function($event_name, $func){echo $event_name,':',var_export($func, true)," added\n";});
$emitter->on('test', $func);
$emitter->on('test', $func);
$emitter->emit('test', array(1 ,2));
echo "----------------------\n";
$emitter->once('test', $func);
$emitter->emit('test', array(3 ,4));
echo "----------------------\n";
$emitter->emit('test', array(4 ,4));
echo "----------------------\n";
$emitter->removeListener('test', $func)->emit('test', array(5 ,6));
echo "----------------------\n";
$emitter->on('test2', function(){echo "test2\n";});

var_dump($emitter->listeners('test2'));
