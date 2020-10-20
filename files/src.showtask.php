<?php
require_once '../tasklist/classes/class.taskdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';
require '../tasklist/files/src.editTaskform.php';


$task = taskdao::getAllTaskByUserId();

$warning = "";
$card = "<div class ='my-18'></div>";
foreach ($task as $t_done) {
    if ($t_done->end_date < time() && $t_done->done == 0) {
        $overdue_days = floor((time() - (($t_done->end_date))) / (60 * 60 * 24));
        if ($overdue_days >= 2) {
            $overdue_days .= " days";
        } else {
            $overdue_days .= " day";
        }
        if ($overdue_days == 0) {
            $overdue_days = floor((time() - $t_done->end_date) / (60*60));
            if ($overdue_days >= 2) {
                $overdue_days .= " hours";
            } else {
                $overdue_days .= " hour";
            }
        }
        $warning .= "<div class='alert alert-danger' role='alert' onclick=markasdone($t_done->id)>"
            . "Your task: $t_done->titel is overdue by $overdue_days!"
            . "</div>";
    }
}
echo $warning;

foreach($task as $t){
    $time_left = floor((($t->end_date) - (time())) / (60 * 60 * 24));
    
    if($t->done == 0 && time() < $t->end_date){
        $output = "Time left: " . $time_left . " days";
        if ($time_left < 1 && time() < $t->end_date){
            $output = "due today";
        }

        $card .= ""
        ."<div class='max-w-md py-4 px-8 shadow-lg rounded-lg my-8 inline-block bg-white md:mx-3 sm:mx-0 w-full '>"

        . "<div class='flex justify-center md:justify-end -mt-16'>"
        ."        <img class='w-20 h-20 object-cover rounded-full border-2 border-indigo-500' src='https://github.com/benonsen.png'>"
        ."    </div>"
        ."    <div>"
        ."        <h2 class='text-gray-800 text-3xl font-semibold'> ". $t->titel."</h2>"
        ."        <p class='mt-2 text-gray-600'>".$t->beschreibung."</p>"
        ."<div class='flex justify mt-4 '>"
        . "<button class='text-xl font-medium text-indigo-500' onclick='markasdone(". $t->id .")'>". $output."</button>"
        . "<button class='text-xl font-medium text-indigo-500' onclick='openeditTaskForm(". $t->id .")' data-toggle='modal' data-target='#editTask'>". $output."</button>"

        ."    </div>"
        ."    <div class='absolute right-0'>"

        ."    </div>"
        ."    </div>"
       
        ."    </div>";
}
}
$card .= "</div>";
echo $card;
?>
<div id='testinputtaskid'>

</div>
<button onclick="logout()" class="btn btn-primary">Abmelden</button>
<script>
    function markasdone(task_id){
        $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=3003',
            data: {
                'task_id_done': task_id
            },
            beforeSend: function(a) {
                a.overrideMimeType('text/html; charset=UTF-8');
            },
            success: function(data) {
                console.log(task_id + "juhu");
                location.reload();
            },
            error: function() {
                location.reload();
            }
        });
    }


    function logout() {
        $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=1',
            data: {
                'logout': 1
            },
            beforeSend: function(a) {
                a.overrideMimeType('text/html; charset=UTF-8');
            },
            success: function(data) {
                location.reload();
            },
            error: function() {
                location.reload();
            }
        });
    }
    //openeditTaskForm(987654321);
    //console.log("sakdfj");


    function openeditTaskForm(taskid) {

        $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=4000',
            data: {
                task_id: taskid
            },
            beforeSend: function(a) {
                a.overrideMimeType('text/html; charset=UTF-8');
            },
            success: function(data) {
                console.log("success");
                $('#testinputtaskid').empty();
                $('#testinputtaskid').append(data);
            },
            error: function() {
                location.reload();
            }
        });
    }

    function sharetask(task_id, user_id) {
        $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=3002',
            data: {
                task_id: task_id,
                user_id: user_id
            },
            beforeSend: function(a) {

            },
            success: function(data) {
                console.log("success");
            },
            error: function() {
                console.log("error");
            }
        });
    }
</script>

<style>
    .card {
        margin-top: 4%;
        margin-right: 5%;
        color: #ffffff;
    }

    a {
        color: #ffffff;
    }


    </style>