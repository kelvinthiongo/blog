<?php

function validateUser($user){
    $errors = array();

    if(empty($user['username'])){
        array_push($errors, 'Username is required!');
    }
    if(empty($user['email'])){
        array_push($errors, 'Email is required!');
    }
    if(empty($user['password'])){
        array_push($errors, 'Password is required!');
    }
    if($user['passwordConf'] !== $_POST['password']){
        array_push($errors, 'Passwords do not match!');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser){
        if(isset($user['update-post']) && $existingPost['id'] != $user['id']){
            array_push($errors, 'Email already exist!');
        }
        if(isset($user['add-post'])){
            array_push($errors, 'Email already exist!');
        }
    }

    return $errors;
}

function validateLogin($user){
    $errors = array();

    if(empty($user['username'])){
        array_push($errors, 'Username is required!');
    }
    if(empty($user['password'])){
        array_push($errors, 'Password is required!');
    }

    return $errors;
}