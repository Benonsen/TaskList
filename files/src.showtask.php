<?php 
    require_once '../tasklist/classes/class.taskdao.php';
    require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';
    
    $task = taskdao::getAllTaskByUserId();
    //var_dump($task);
//    foreach($task as $t_done){
//        if($t_done->end_date < time()){
//            //task isch schun verfollen -> warning
//        }
//    }
    $htmlcontetOutput = "";
    $task_counter = 0;
    $current_id = 0;
    foreach($task as $t){
        $current_id = $t->id;
        if($task_counter == 0){
            //neue zeile
            $htmlcontetOutput .= "<div class='row' style='margin-top:2%;'>"
                ."<div class='col-md-3'>"
                  ."<div class='card'>"
                    ."<div class='card-body'>"
                      ."<h5 class='card-title'>".$t->titel ."</h5>"
                      ."<p class='card-text'>".$t->beschreibung."</p>"
                      ."<a href='' onclick='edittask(".$t->id.")' class='card-link'>Edit</a>"
                      ."<a href='' onclick='marktaskasdone(".$t->id.")' class='card-link'>Mark as done</a>"
                    ."</div>"
                  ."</div>"
                ."</div>";
        }else if($task_counter % 3 == 0){
            $htmlcontetOutput .= "</div>"
                    ."<div class='row'  style='margin-top:2%;'>"
                ."<div class='col-md-3'>"
                  ."<div class='card'>"
                    ."<div class='card-body'>"
                      ."<h5 class='card-title'>".$t->titel ."</h5>"
                      ."<p class='card-text'>".$t->beschreibung."</p>"
                      ."<a href='' onclick='edittask(".$t->id.")' class='card-link'>Edit</a>"
                      ."<a href='' onclick='marktaskasdone(".$t->id.")' class='card-link'>Mark as done</a>"
                    ."</div>"
                  ."</div>"
                ."</div>";
        }
        
        else{
           $htmlcontetOutput .= "<div class='col-md-3'>"
                        ."<div class='card'>"
                          ."<div class='card-body'>"
                      ."<h5 class='card-title'>".$t->titel ."</h5>"
                      ."<p class='card-text'>".$t->beschreibung."</p>"
                      ."<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editTask' onclick='taskid(".$t->id.")'>Create new task!</button>"
                      ."<a href='' onclick='marktaskasdone(".$t->id.")' class='card-link'>Mark as done</a>"
                          ."</div>"
                        ."</div>"
                      ."</div>"; 
        }
        $task_counter++;
        echo $task_counter;

    }
    $slkjdf = "";
   
    
   echo $htmlcontetOutput;
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
                            <input type="text" id="editTaskTitle" class="form-control" placeholder="Title"  autofocus autocomplete="off" value="<?php echo $this->$task[$current_id]->titel; ?>">
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

<script>
function editTask(){
    task_id = taskid();
}
function marktaskasdone(taskid){
    window.alert(taskid+1);
    
}

function taskid(taskid){
    return taskid;
}
</script>