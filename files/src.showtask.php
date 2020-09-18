<?php 
    require_once '../tasklist/classes/class.taskdao.php';
    require_once '../tasklist/classes/database/class.STDMySQLDatabase.php';
    
    $task = taskdao::getAllTaskByUserId();
    //var_dump($task);
    foreach($task as $t_done){
        if($t_done->end_date < time()){
            //task isch schun verfollen -> warning
        }
    }
    $htmlcontetOutput = "";
    $task_counter = 0;
    foreach($task as $t){
        
        if($task_counter == 0){
            //neue zeile
            $htmlcontetOutput .= "<div class='row' style='margin-top:2%;'>"
                ."<div class='col-md-3'>"
                  ."<div class='card'>"
                    ."<div class='card-body'>"
                      ."<h5 class='card-title'>".$t->titel ."</h5>"
                      ."<p class='card-text'>".$t->beschreibung."</p>"
                      ."<a href='#' class='card-link'>Card link</a>"
                      ."<a href='#' class='card-link'>Another link</a>"
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
                            ."<a href='#' class='card-link'>Card link</a>"
                            ."<a href='#' class='card-link'>Another link</a>"
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
<script>
function edittask(taskid){
    window.alert(taskid);
}
function marktaskasdone(taskid){
    window.alert(taskid+1);
}
</script>