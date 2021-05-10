<?php
$result = file_get_contents("http://api.serri.codefactory.live/random/");
#var_dump($result);

$info = json_decode($result);
#var_dump($info);

echo $info->joke;
