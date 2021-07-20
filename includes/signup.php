<?php

$info = (Object)[];

$data = false;
$data['userid'] = $DB->generate_id(20);
$data['date'] = date("Y-m-d H:i:s");

// Validate username
$data['username'] = $DATA_OBJ->username;
if(empty($DATA_OBJ->username)){ 
    $Error .= "Please enter a valid username! ";
}
else{
    if(strlen($DATA_OBJ->username) < 6){
        $Error .= "Username must be at least 6 characters! ";
    }
    elseif(!preg_match("/^[a-z A-Z 0-9]*$/", $DATA_OBJ->username)){
        $Error .= "Please enter a valid username! "; 
    }
}
$data['email'] = $DATA_OBJ->email;
if(empty($DATA_OBJ->email)){ 
    $Error .= "Please enter a valid email! ";
}
else{
    if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $DATA_OBJ->email)){
        $Error .= "Please enter a valid email! "; 
    }
}

$data['password'] = $DATA_OBJ->password;

$password = $DATA_OBJ->password2;
    if(empty($DATA_OBJ->password)){ 
        $Error .= "Please enter a valid password!";
    }
    else{
        if(strlen($DATA_OBJ->password) < 6){
            $Error .= "Password must be at least 6 characters! ";
        }
        if($DATA_OBJ->password != $DATA_OBJ->password2){
            $Error .= "Password do not match!"; 
        }
    }

if($Error == ""){
    $query = "insert into users (userid,username,email,password,date) values (:userid,:username,:email,:password,:date)";
    $result = $DB->write($query, $data);

    if($result){
        $info->message = "Create successfully!";
        $info->data_type = "info";
        echo json_encode($info);
    }
    else {
        $info->message = "Fail";
        $info->data_type = "error";
        echo json_encode($info);
    }
}
else {
     $info->message = $Error;
     $info->data_type = "error";
     echo json_encode($info);
}