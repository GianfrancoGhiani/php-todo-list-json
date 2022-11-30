<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-Requested-With");

$list = file_get_contents('data.json');
$list = json_decode($list, true);



if (!empty($_POST)) {
    header('Content-Type: text/html');
    $newtask = (isset($_POST['newtask']) ? $_POST['newtask'] : '');
    $list[] = $newtask;
}
header('Content-Type: application/json');
$list = json_encode($list, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
file_put_contents('data.json', $list);
echo $list;