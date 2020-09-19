<?php
    require_once '../tasklist/classes/class.taskdao.php';
    require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';
    $taskedit = Taskdao::getAllTaskByUserId(); 
//    var_dump($taskedit);
    if(isset($_POST['task_id'])){
            $taskeditIndex = $_POST['task_id'];
    }
    
?>
<!-- Modal -->
<div class="modal fade" id="editTask" tabindex="-1" role="dialog" aria-labelledby="editTask" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit your Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearFormCreateTask()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-signin">
                        <div class="form-label-group">
                            <input type="text" id="editTaskTitle" class="form-control" placeholder="Title"  value ="<?php echo $taskedit[7]->titel?>" autofocus autocomplete="off">
                            <label for="editTaskTitle">Title</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="editTaskDescripton" class="form-control" placeholder="Description">
                            <label for="editTaskDescripton">Description</label>
                        </div>
            
                        <div class="form-label-group">
                            <input type="date" id="editTaskDate" class="form-control" placeholder="Date" min="<?php echo date('Y-m-d', time())?>">
                            <label for="editTaskDate">Date</label>
                        </div>

                        <div class="form-group">
                          <label for="EditformControlRange" style="text-align: center;">Priority</label>
                          <input type="range" min="0" max="100" value="50" step="10" class="form-control-range" id="EditformControlRange">
                          <p>Value: <span id="outputPercentagePriorityEdit"></span></p>
                        </div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" style="margin-top:5%;" data-dismiss="modal" onclick="editTask()">Save changes</button>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" style="margin-top:3%;" data-dismiss="modal" onclick="clearFormCreateTask()">Cancel</button>

        </form>
      </div>
    </div>
  </div>
</div>