<?php
require_once '../tasklist/header.php';

echo "Hello World!";
?>
<button type="button" class="btn btn-outline-primary" onclick="logout()">Abmelden</button>
<script>
    function logout() {
        $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=1',
            data: {
                'logout': 1
            },
            beforeSend:function(a){
                a.overrideMimeType('text/html; charset=UTF-8');
            },
            success:function(data){
                location.reload();
            },
            error:function(){
                location.reload();
            }
        });
    }
</script>