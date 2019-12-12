<?php

model::load('database');
model::load('blazer');

function loginPage($message){
    $view = new Blazer();
    if(empty($message)){
        $message = "A simple todo application built on LAMPP stack and deplyoyed on Azure";
    }
    $data = ['message'=>$message];
    $view->render('homepage.landing.php', $data, $GLOBALS['turbo']);
}

function formHandler(){
    $db = new database();
    
    if(isset($_POST['login'])){
        $username = io::post('username');
        $password = io::post('password');

        // check if credentials valid
        $data = $db->table('users')->select(" `username`='".$username."' AND `password`='".sha1($password)."' ");
        if($data != false or !empty($data[0])){
            // store user details in sesssion
            $_SESSION['user'] = $data[0];
            header("Location: ".$GLOBALS['app']['protected']['app']['url'].'dashboard');
            // console($_SESSION);
        }else{
            loginPage("Invalid Credentials. Try Again");
        }
    }
        
    if(isset($_POST['signup'])){
        $name = io::post('name');
        $username = io::post('username');
        $password = io::post('password');
        $password2 = io::post('password2');

        if($password != $password2){
            loginPage("Passwords don't match");
            return;
        }

        // check if username exists
        $data = $db->table('users')->select(" `username`='".$username."' ");
        if($data != false or !empty($data)){
            loginPage("Username already exists :/ ");
            return;
        }

        // else insert data to databse
        $data = $db->table('users')->insert(['name'=>$name, 'username'=>$username, 'password'=>sha1($password)]);
        if($data == 1){
            loginPage("Account created ! Log in to view your dashboard.");
        }
 
    }
}

function dashboard(){
    $db = new database();
    $view = new blazer();
    
    
    if(!isset($_SESSION['user'])){
        loginPage("Invalid Auth. Try Again.");
        return;
    }
    
    // get user tasks
    $tasks = $db->table('tasks')->select("`useruid`='" .$_SESSION['user']['uid']. "' ORDER BY `uid` DESC");
    if(empty($tasks) || $tasks==""){
        $tasks = false;
    }

    $data = [];
    $data['user'] = $_SESSION['user'];
    $data['tasks'] = json_encode($tasks);

    // console($data);
    $view->render('homepage.dashboard.php', $data, $GLOBALS['turbo']);
    
}

function logout(){
    session_unset();
    session_destroy();
    loginPage("Thanks for your visit.");
    return;
}
