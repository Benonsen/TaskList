<?php
require_once '../tasklist/classes/class.taskdao.php';
require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

$task = taskdao::getAllTaskByUserId();
$randomnummer = 1;

//var_dump($task);
$warning = "";
foreach ($task as $t_done) {
    if ($t_done->end_date < time() && $t_done->done != 0) {
        $overdue_days = floor((time() - (($t_done->end_date))) / (60 * 60 * 24));
        if ($overdue_days >= 2) {
            $overdue_days .= " days";
        } else {
            $overdue_days .= " day";
        }
        if ($overdue_days == 0) {
            $overdue_days = floor(date('h', time()) - date('h', $t_done->end_date));
            if ($overdue_days >= 2) {
                $overdue_days .= " hours";
            } else {
                $overdue_days .= " hour";
            }
        }
        $warning .= "<div class='alert alert-danger' role='alert' onclick=testnotification($t_done->id)>"
            . "Your task: $t_done->titel is overdue by $overdue_days!"
            . "</div>";
    }
}
echo $warning;
$htmlcontetOutput = "";
$task_counter = 0;
$current_id = 0;
foreach ($task as $t) {
    if ($t->done != 1) {
        if ($task_counter == 0) {
            //neue zeile
            $htmlcontetOutput .= "<div class='row'>"
                . "<div class='col-md-3'>"
                . "<div class='card' >"
                . "<div class='card-body' >"
                . "<h5 class='card-title'>" . $t->titel . "</h5>"
                . "<p class='card-text'>" . $t->beschreibung . "</p>"
                . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editTask' data-backdrop='static' data-keyboard='false' onclick='openeditTaskForm(" . $t->id . ")'>Edit task</button>"
                . "<button type='button' class='btn btn-primary'><a href='' onclick='marktaskasdone(" . $t->id . ")' class='card-link'>Mark as done</a></button>"
                . "</div>"
                . "</div>"
                . "</div>";
        } else if ($task_counter % 3 == 0) {
            $htmlcontetOutput .= "</div>"
                . "<div class='row'>"
                . "<div class='col-md-3'>"
                . "<div class='card'>"
                . "<div class='card-body' >"
                . "<h5 class='card-title'>" . $t->titel . "</h5>"
                . "<p class='card-text'>" . $t->beschreibung . "</p>"
                . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editTask' data-backdrop='static' data-keyboard='false' onclick='openeditTaskForm(" . $t->id . ")'>Edit task</button>"
                . "<button type='button' class='btn btn-primary'> <a href='' onclick='marktaskasdone(" . $t->id . ")' class='card-link'>Mark as done</a></button>"
                . "</div>"
                . "</div>"
                . "</div>";
        } else {
            $htmlcontetOutput .= "<div class='col-md-3'>"
                . "<div class='card'>"
                . "<div class='card-body' >"
                . "<h5 class='card-title'>" . $t->titel . "</h5>"
                . "<p class='card-text'>" . $t->beschreibung . "</p>"
                . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editTask' data-backdrop='static' data-keyboard='false' onclick='openeditTaskForm(" . $t->id . ")'>Edit task</button>"
                . "<button type='button' class='btn btn-primary'> <a href='' onclick='marktaskasdone(" . $t->id . ")' class='card-link'>Mark as done</a></button>"
                . "<button type='button' class='btn btn-primary'> <a href='' onclick='sharetask(" . $t->id . ", " . $_SESSION['user']['id'] . ")' class='card-link'>Mark as done</a></button>"
                . "</div>"
                . "</div>"
                . "</div>";
        }
        $task_counter++;
    }
}
echo $htmlcontetOutput;
?>
<div id="testinputtaskid">
</div>
<button onclick="logout()" class="btn btn-primary">Abmelden</button>
    <script>
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
    var countereditTask = 0;

    function openeditTaskForm(taskid) {

        $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=3001',
            data: {
                task_id: taskid
            },
            beforeSend: function(a) {
                console.log(countereditTask);
                if (countereditTask > 1) {
                    document.getElementById('editTaskTitle').value = ' ';
                    document.getElementById('editTaskDescripton').value = ' ';
                    document.getElementById('editTaskDate').value = '';
                    document.getElementById('EditformControlRange').value = 50;
                    var output = document.getElementById("outputPercentagePriority");
                    output.innerHTML = "50";
                    console.log("fertig");
                }
                countereditTask += 1;
                a.overrideMimeType('text/html; charset=UTF-8');
            },
            success: function(data) {

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
    

<style>