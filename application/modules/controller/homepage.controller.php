<?php

model::load('database');
model::load('blazer');

function loginPage($message){
    $view = new Blazer();
    $data = ['message'=>"A simple todo application built on LAMPP stack and deplyoyed on Azure"];
    $view->render('homepage.landing.php', $data, $GLOBALS['turbo']);
}


function formHandler(){
    if(isset($_POST['login'])){
        $username = io::post('username');
        $password = io::post('password');
        
        // $db = new database();
        // check if auth exists
        // $data  = $db->table()
        
    }
        
    if(isset($_POST['signup'])){
        $db = new database();
        $username = io::post('username');
        $password1 = io::post('password1');
        $password2 = io::post('password2');


        if($password1 != $password2){
            $message = "Passwords dont match";
        }

        $data = $db->table('users')->select(" `username`='".$username."' ");
        
        console($data);


        // $message = $password1 == $password2 ? $message + "Passwords don't match" : $message;
        loginPage($message);

    }
}