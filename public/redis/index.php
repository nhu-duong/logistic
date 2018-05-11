<?php

//Connecting to Redis server on localhost 
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
echo "Connection to server sucessfully<br>";
//check whether server is running or not 
echo "Server is running: " . $redis->ping() . '<br>';

// Redis string
echo '<br>Test redis string: ';
$redis->set('sample_key', 'sample_value');
echo $redis->get('sample_key') . '<br>';

// Test redis list
echo '<br> Test redis list: <br>';
for ($i = 0; $i < 10; $i++) {
    $redis->lPush('list_key', 'value ' . $i);
    
}
echo 'Added 10 items: <br>';
$listValues = $redis->lrange('list_key', 0, 20);
var_dump($listValues);
echo '<br>Item from 5 to 10: <br>';
$listValues = $redis->lrange('list_key', 4, 9);
var_dump($listValues);
$redis->lRemove('list_key');