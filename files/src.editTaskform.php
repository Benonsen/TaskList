

<?php
class EditTask {
public static function OutputDataEditTask($task_id) {
    require_once '../tasklist/classes/class.taskdao.php';
    require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';

    $outputdata = Taskdao::getDataForTaskEdit($task_id);
    
?>

<script>

// olle felder oanfoch mol clearen; schuscht stean no olte infos drinnen
function clearEditTaskForm() {

    console.log("fertig");
}
//clearEditTaskForm();
</script>
<?php $result = "<div class='modal fade' id='editTask' tabindex='-1' role='dialog' aria-labelledby='editTask' aria-hidden='true'>"
    ." <div class='modal-dialog modal-dialog-centered' role='document'>"
    ."    <div class='modal-content'>"
    ."      <div class='modal-header'>"
    ."           <h5 class='modal-title' id='exampleModalLongTitle'>Edit your Task</h5>"
    ."          <button type='button' class='close' data-dismiss='modal' aria-label='Close'"
    ."              onclick='clearEditTaskForm()'>"
    ."              <span aria-hidden='true'>&times;</span>"
    ."          </button>"
    ."      </div>"
    ."      <div class='modal-body'>"
    ."          <form class='form-signin'>"
    ."              <div class='form-label-group'>"
    ."                  <input type='text' id='editTaskTitle' class='form-control' placeholder='Title'"
    ."                      value='".$outputdata[0]->titel."' autocomplete='off'>"
    ."                  <label for='editTaskTitle'>Title</label>"
    ."              </div>"
    ."              <div class='form-label-group'>"
    ."                  <input type='text' id='editTaskDescripton' class='form-control'"
    ."                      value='" . $outputdata[0]->beschreibung ."' placeholder='Description'>"
    ."                  <label for='editTaskDescripton'>Description</label>"
    ."              </div>"
    ."              <div class='form-label-group'>"
    ."                  <input type='date' id='editTaskDate' class='form-control'"
    ."                      value='". date('Y-m-d', $outputdata[0]->end_date) ."' placeholder='Date'"
    ."                      min='". date('y-m-d', time()) ."'"
    ."                  <label for='editTaskDate'>Date</label>"
    ."              </div>"
    ."              <div class='form-group'>"
    ."                  <label for='EditformControlRange' style='text-align: center;'>Priority</label>"
    ."                  <input type='range' min='0' max='100' value='".$outputdata[0]->priority ."'"
    ."                      step='10' class='form-control-range' id='EditformControlRange'>"
    ."                  <p>Value: <span id='outputPercentagePriorityEdit'></span></p>"
    ."              </div>"
    ."              <div class='custom-control custom-switch'>"
    ."                  <input type='checkbox' class='custom-control-input' id='customSwitch1'>"
    ."                  <label class='custom-control-label' for='customSwitch1'>Toggle this switch element</label>"
    ."              </div>"
    .""
    ."                <button class='btn btn-lg btn-primary btn-block text-uppercase' type='button' style='margin-top:5%;'"
    ."                  data-dismiss='modal' onclick='editTask()'>Save changes</button>"
    ."              <button class='btn btn-lg btn-primary btn-block text-uppercase' type='button' style='margin-top:3%;'"
    ."                  data-dismiss='modal' onclick='clearEditTaskForm()'>Cancel</button>"
    ."          </form>"
    ."      </div>"
    ."  </div>"
    ."</div>"
    ."</div>";

echo $result; ?>

<script>
function editTask(){
    window.alert("asf");
}
</script>
<?php } }?>