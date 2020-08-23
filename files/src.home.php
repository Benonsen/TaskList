<?php
require_once '../tasklist/header.php';

?>

<link href="../tasklist/css/sb-admin-2.min.css" rel="stylesheet">
<style>
    /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

    .progress {
        width: 100px;
        height: 100px;
        background: none;
        position: relative;
    }

    .progress::after {
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        border: 6px solid #eee;
        position: absolute;
        top: 0;
        left: 0;
    }

    .progress>span {
        width: 50%;
        height: 100%;
        overflow: hidden;
        position: absolute;
        top: 0;
        z-index: 1;
    }

    .progress .progress-left {
        left: 0;
    }

    .progress .progress-bar {
        width: 100%;
        height: 100%;
        background: none;
        border-width: 6px;
        border-style: solid;
        position: absolute;
        top: 0;
    }

    .progress .progress-left .progress-bar {
        left: 100%;
        border-top-right-radius: 80px;
        border-bottom-right-radius: 80px;
        border-left: 0;
        -webkit-transform-origin: center left;
        transform-origin: center left;
    }

    .progress .progress-right {
        right: 0;
    }

    .progress .progress-right .progress-bar {
        left: -100%;
        border-top-left-radius: 80px;
        border-bottom-left-radius: 80px;
        border-right: 0;
        -webkit-transform-origin: center right;
        transform-origin: center right;
    }

    .progress .progress-value {
        position: absolute;
        top: 0;
        left: 0;
    }

.card{
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid #f6f6f6;
    border-radius: .25rem;
}


    html {
        background: #d6d6d6;
        color: #d6d6d6;
    }


</style>


<body>

    <div class="card text" style="margin:4%;">

        <div class="card-body">
            <h5 class="card-title">Task 1</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.
            <div class=col-sm-6">
                <div class="progress mx-auto" data-value='25'>
                <span class="progress-left">
                            <span class="progress-bar border-danger"></span>
              </span>
                <span class="progress-right">
                            <span class="progress-bar border-danger"></span>
              </span>
            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                <div class="h2 font-weight-bold">25%</div>
            </div>
        </div>
        </div>
            </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>

    <div class="card-body">
        <h4 class="card-title mb-4">Upcoming</h4>
        <div class="table-responsive">
            <table class="table table-nowrap table-centered mb-0">
                <tbody>
                <tr>
                    <td style="width: 60px;">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1"></label>
                        </div>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Create a Skote Dashboard UI</a></h5>
                    </td>
                    <td>
                        <div class="team">
                            <a href="javascript: void(0);" class="team-member">
                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs m-1" alt="">
                            </a>

                            <a href="javascript: void(0);" class="team-member">
                                <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs m-1" alt="">
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                            <span class="badge badge-pill badge-soft-secondary font-size-11">Waiting</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" checked="">
                            <label class="custom-control-label" for="customCheck2"></label>
                        </div>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Create a New Landing UI</a></h5>
                    </td>
                    <td>
                        <div class="team">
                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs m-1" alt="">
                            </a>

                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs m-1" alt="">
                            </a>

                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                <div class="avatar-xs">
                                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                                3 +
                                                                            </span>
                                </div>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                            <div class="progress mx-auto" data-value='25'>
                <span class="progress-left">
                            <span class="progress-bar border-danger"></span>
              </span>
                                <span class="progress-right">
                            <span class="progress-bar border-danger"></span>
              </span>
                                <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                    <div class="h2 font-weight-bold">25%</div>
                                </div>
                           <span class="badge badge-pill badge-soft-primary font-size-11">Approved</span>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                            <label class="custom-control-label" for="customCheck3"></label>
                        </div>
                    </td>
                    <td>
                        <h5 class="text-truncate font-size-14 m-0"><a href="#" class="text-dark">Create a Skote Logo</a></h5>
                    </td>
                    <td>
                        <div class="team">
                            <a href="javascript: void(0);" class="team-member d-inline-block">
                                <div class="avatar-xs">
                                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                                F
                                                                            </span>
                                </div>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="text-center">
                            <span class="badge badge-pill badge-soft-secondary font-size-11">Waiting</span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

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
        $(function() {

            $(".progress").each(function() {

                var value = $(this).attr('data-value');
                var left = $(this).find('.progress-left .progress-bar');
                var right = $(this).find('.progress-right .progress-bar');

                if (value > 0) {
                    if (value <= 50) {
                        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                    } else {
                        right.css('transform', 'rotate(180deg)')
                        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                    }
                }

            })

            function percentageToDegrees(percentage) {

                return percentage / 100 * 360

            }

        });
    </script>
</body>