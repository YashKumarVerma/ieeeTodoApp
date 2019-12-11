<?php


model::load('database');

// function to create new task
function createTask(){
    // check invalid user
    if(!isset($_SESSION['user'])){
        $data = [
            'success'=>false,
            'msg'=>'invalid auth',
            'data'=>false
        ];
        print(json_encode($data));
    }

    // proceede for valid user
    $db = new database();
    $textData = io::post('text');
    $time = time();

    $status = $db->table('tasks')->insert([
        'useruid'=>$_SESSION['user']['uid'],
        'taskname'=>$textData,
        'checked'=>0,
        'timestamp'=>$time
    ]);

    $resp = [
        'success'=>$status,
        'message'=>'item added successfully',
        'data' => false
    ];

    print(json_encode($resp));
}


// function to return tasks
