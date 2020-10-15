

<?php
    require_once '../tasklist/classes/class.taskdao.php';
    require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';
    $taskedit = Taskdao::getAllTaskByUserId(); 
//    var_dump($taskedit);
//    if(isset($_POST['task_id'])){
//            $taskeditIndex = $_POST['task_id'];
//            foreach ($taskedit as $tid){
//                echo $tid->id . ", ";
//            }
//    }
    for($i = 0; $i < count($taskedit); $i++){
        if($taskedit[$i]->id == $_POST['task_id']){
            $indexarray = $i;
        }
    }
    
?>

<script>
window.alert("1");
// olle felder oanfoch mol clearen; schuscht stean no olte infos drinnen
function clearEditTaskForm() {
    document.getElementById('editTaskTitle').value = ' ';
    document.getElementById('editTaskDescripton').value = ' ';
    document.getElementById('editTaskDate').value = '';
    document.getElementById('EditformControlRange').value = 50;
    var output = document.getElementById("outputPercentagePriority");
    output.innerHTML = "50";
    console.log("fertig");
}
//clearEditTaskForm();
</script>

<!-- Modal -->
<div class="modal fade" id="editTask" tabindex="-1" role="dialog" aria-labelledby="editTask" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit your Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="clearEditTaskForm()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin">
                    <div class="form-label-group">
                        <input type="text" id="editTaskTitle" class="form-control" placeholder="Title"
                            value="<?php echo $taskedit[$indexarray]->titel?>" autocomplete="off">
                        <label for="editTaskTitle">Title</label>
                    </div>

                    <div class="form-label-group">
                        <input type="text" id="editTaskDescripton" class="form-control"
                            value=" <?php echo $taskedit[$indexarray]->beschreibung ?>" placeholder="Description">
                        <label for="editTaskDescripton">Description</label>
                    </div>

                    <div class="form-label-group">
                        <input type="date" id="editTaskDate" class="form-control"
                            value="<?php echo date('Y-m-d', $taskedit[$indexarray]->end_date) ?>" placeholder="Date"
                            min="<?php echo date('Y-m-d', time())?>">

                        <label for="editTaskDate">Date</label>
                    </div>

                    <div class="form-group">
                        <label for="EditformControlRange" style="text-align: center;">Priority</label>
                        <input type="range" min="0" max="100" value="<?php echo $taskedit[$indexarray]->priority ?>"
                            step="10" class="form-control-range" id="EditformControlRange">
                        <p>Value: <span id="outputPercentagePriorityEdit"></span></p>
                    </div>


                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                    </div>



                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" style="margin-top:5%;"
                        data-dismiss="modal" onclick="editTask()">Save changes</button>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" style="margin-top:3%;"
                        data-dismiss="modal" onclick="clearEditTaskForm()">Cancel</button>

                </form>
            </div>
        </div>
    </div>
</div>