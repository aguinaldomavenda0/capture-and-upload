<?php

require_once '../include.php';

if(isset($_POST['action']) && $_POST['action'] == "add"){
    $data = $_POST['base_img'];
    $data = str_replace('data:image/'.$_POST['type'].';base64,', '', $data);
    $data = str_replace(' ', '+', $data); 
    $fileData = base64_decode($data);
    $fileName = "MAVENDA-".time().".".$_POST['type'];
    file_put_contents("./../../files/upload/".$fileName, $fileData);
    $result = (new Photo())->add("SCAM - ".$fileName, $fileName);
    if($result==0){echo(json_encode(array('status'=>"error", "statusNumber" => 0, 'message' => 'Foto não salva.')));}
    else{echo(json_encode(array('status'=>"success", "statusNumber" => 1, 'message' => 'Foto salva.')));}
}