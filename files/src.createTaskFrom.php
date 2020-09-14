<?php

?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create new Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-signin">
                        <div class="form-label-group">
                            <input type="text" id="createTaskTitle" class="form-control" placeholder="Title"  autofocus autocomplete="off">
                            <label for="username">Title</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="createTaskDescripton" class="form-control" placeholder="Description">
                            <label for="password">Description</label>
                        </div>

                                        <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onClick="doLogin()">Log In</button>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onClick="opensignupform()" style="margin-top:3%;">Create a new account</button>
                        <!--
                        <a  href="files/signup.php">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" style="margin-top: 3%">Sign In</button>
                        </a>
                        -->

                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datepicker({
                    format: 'LT'
                });
            });
</script>