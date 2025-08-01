<?php 
header("Content-Type:application/json");
header("Access-control-Allow-Origin:*");

if($_SERVER["SERVER_NAME"]=='127.0.0.1'){
$data=["massege"=>"please change domain!","connection"=>false];
echo json_encode($data);}else{
$data=["student"=>[[
    "name"=>"Mohammed",
    "age"=>20,
    "email"=>"Mohammed@g.c",
],[
    "name"=>"magdy",
    "age"=>30,
    "email"=>"magdy@g.c"

]],
"connection"=>true];
echo json_encode($data);

}