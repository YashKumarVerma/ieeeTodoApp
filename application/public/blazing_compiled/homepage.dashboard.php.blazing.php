<!DOCTYPE html>
<html lang="en">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1.0" name="viewport">
    <title><?php echo $GLOBALS["protected"]["app"]["name"] ?></title>
    <style>
     .material-icons{
        cursor:pointer;
     }   
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://localhost/ieeetodo//assets/css/material.css"> <link rel="stylesheet" type="text/css" href="http://localhost/ieeetodo//assets/css/custom.css"> 
</head>

<body>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container">
            <a class="brand-logo" href="#" id="logo-container">IEEE</a>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a class="btn-small waves-effect waves-light orange" href="<?php echo $GLOBALS["protected"]["app"]["url"] ?>dashboard/logout">Logout</a>
                </li>
            </ul>
            <ul class="sidenav" id="nav-mobile">
                <li>
                    <a href="#">Navbar Link</a>
                </li>
            </ul><a class="sidenav-trigger" data-target="nav-mobile" href="#"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br>
            <br>
            <h1 class="header center orange-text"><?php echo $GLOBALS["protected"]["app"]["name"] ?></h1>
            <div class="row center">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card white">
                            <div class="card-content">
                                <!--  -->
                                <div class="row">
                                    <div class="col s12">
                                        <div class="row">
                                            <div class="input-field col s10 m10">
                                                <input class="validate" id="taskTextField" type="text">
                                                <label for="taskTextField">Add a task</label>
                                            </div>
                                            <div class="input-field col s2 m2">
                                                <button class="btn waves-effect waves-light orange" name="action" type="button" id="addTask" >Add Task!</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                            <div class="card-action">
                               <!-- data table -->
                               <table>
                                 <tbody id="tableOutput"></tbody>
                                 </table>
                                       
                               <!-- data table ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row center">
                <!-- <button data-target='modal2' class="btn-large waves-effect waves-light orange modal-trigger">Create Account</a> -->
            </div>
            <br>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 m4"></div>
            </div>
        </div>
        <br>
        <br>
    </div>
    <footer class="page-footer light-blue lighten-1">
        <div class="footer-copyright">
            <div class="container">
                <a class="white-text" href="https://github.com/YashKumarVerma/ieeeTodoApp">View Source Code</a>
            </div>
        </div>
    </footer><script type="text/javascript" src="http://localhost/ieeetodo//assets/js/jquery.js"></script><script type="text/javascript" src="http://localhost/ieeetodo//assets/js/material.js"></script>
</body>
<script>

$(document).ready(function() {
   processTasks();
   $('.sidenav').sidenav();
   $('.modal').modal();
});

// process new task addtion
$("#addTask").on("click",function(){
   var textField = $("#taskTextField").val();
   var time = new Date();
   var timestamp = Math.round(time.getTime()/1000);

   // attempt to send data
   $.ajax({
      url:"<?php echo $GLOBALS["protected"]["app"]["url"] ?>api/createTask",
      method:"POST",
      data:{ text:textField, time:timestamp },
      success:function(resp){
         resp = JSON.parse(resp);
         if(resp.success){
            // success, so update the table with data
            // $("#tableOutput").append(string);
         }else{
            // false, so show error
            alert("There was an error processing your request : " + resp.message);
         }
      }
   })
});

function processTasks(){
   var data = <?= $tasks ?>;
   // if there is data, or it is non zero
   if(data){
      // populate the table with data #tableOutput
      data.forEach(function(x){
         addEntry(x);
      });

   }
   // when there is no data
   else{
      $("#tableOutput").html("<tr><td>Looks like you have finished all your work ! Great Job.</td></tr>");
   }
}

function processCheckbox(uid){
   console.log(uid);
}

function processDelete(uid){
   console.log(uid);
}

function addEntry(x){
   string = "";
   string += '<tr id="task_'+x.uid+'">';
   string += '<td id="icon_'+x.uid+'" data-uid="'+x.uid+'" class="holder_icon">';
   string += '<p><label><input id="checkbox_'+x.uid+'" onclick="processCheckbox('+x.uid+')" type="checkbox"/><span><span></label></p></td>';
   string += '<td id="text_'+x.uid+'" class="holder_text">'+x.taskname+'</td>';
   string += '<td id="delete_'+x.uid+'" onclick="processDelete('+x.uid+')" data-uid="'+x.uid+'" class="right-align holder_delete"><i class="material-icons">close</i></td>';
   string += '<tr>';
   $("#tableOutput").append(string);
}

</script>
</html>