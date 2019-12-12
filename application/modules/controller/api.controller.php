
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

    // get id of latest upload
    $dataOfLatestUpload = $db->select("SELECT `uid` FROM `tasks` WHERE `timestamp`='".$time."' LIMIT 1 ;")[0]['uid'];

    $resp = [
        'success'=>$status,
        'message'=>'item added successfully',
        'data' => [
            'uid'=>$dataOfLatestUpload,
            'time'=>$time
        ]
    ];

    print(json_encode($resp));
}


// function to return tasks
function deleteTask(){
    // check invalid user
    if(!isset($_SESSION['user'])){
        $data = [
            'success'=>false,
            'msg'=>'invalid auth',
            'data'=>false
        ];
        print(json_encode($data));
    }

    // now delete item
    $db = new database();
    $uid = io::post('uid');
    $status = $db->query("DELETE FROM `tasks` WHERE `uid`='".$uid."' ");

    $resp = [
        'success'=>$status,
        'message'=>'item deleted successfully',
        'data' => ['uid'=>$uid]
    ];

    print(json_encode($resp));
}



function updateCheck(){
    // check invalid user
    if(!isset($_SESSION['user'])){
        $data = [
            'success'=>false,
            'msg'=>'invalid auth',
            'data'=>false
        ];
        print(json_encode($data));
    }

    // now update the database
    $db         = new database();
    $uid        = io::post('uid');
    $checked    = io::post('checked');
    $x = 0;
    if($checked == "true"){
        $x = 1;
    }

    $status = $db->table('tasks')->update([
        'checked'=>$x
    ], " `uid`='".$uid."' ");


    $resp = [
        'success'=>$status,
        'message'=>'item state updated successfully',
        'data' => ['uid'=>$uid]
    ];

    print(json_encode($resp));
}