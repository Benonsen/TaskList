<?php

?>
<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  height: 100%;
  background: #2e59d9;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  height: 100%;

  background: #2e59d9;
  cursor: pointer;
}
</style>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Create new task!
</button>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create new Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearFormCreateTask()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-signin">
                        <div class="form-label-group">
                            <input type="text" id="createTaskTitle" class="form-control" placeholder="Title"  autofocus autocomplete="off">
                            <label for="createTaskTitle">Title</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="createTaskDescripton" class="form-control" placeholder="Description">
                            <label for="createTaskDescripton">Description</label>
                        </div>
            
                        <div class="form-label-group">
                            <input type="date" id="createTaskDate" class="form-control" placeholder="Date" min="<?php echo date('Y-m-d', time())?>">
                            <label for="createTaskDate">Date</label>
                        </div>

                        <div class="form-group">
                          <label for="formControlRange" style="text-align: center;">Priority</label>
                          <input type="range" min="0" max="100" value="50" step="10" class="form-control-range" id="formControlRange">
                          <p>Value: <span id="demo"></span></p>
                        </div>

            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" style="margin-top:5%;" onclick="createTask()">Save task</button>
            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" style="margin-top:3%;" data-dismiss="modal" onclick="clearFormCreateTask()">Cancel</button>

        </form>
      </div>
    </div>
  </div>
</div>
<script>
var slider = document.getElementById("formControlRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
function clearFormCreateTask(){
    document.getElementById('createTaskTitle').value = "";
    document.getElementById('createTaskDescripton').value = "";
    document.getElementById('createTaskDate').value = "";
    document.getElementById('formControlRange').value = 50;
}
function createTask(){
    var titel = document.getElementById('createTaskTitle').value;
    var beschreibung = document.getElementById('createTaskDescripton').value;
    var datum = document.getElementById('createTaskDate').value;
    var prioritaet = document.getElementById('formControlRange').value;
    
    if(!!titel && !!beschreibung && !!datum && !!prioritaet){
        //kein feld isch leer; daten koennen in zur db gschicket werden
        window.alert("data will be transmitted");
    }
    else{
        window.alert("please enter all information provided");
    }
}
</script>