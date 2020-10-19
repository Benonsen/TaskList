<link href="../tasklist/css/sb-admin-2.min.css" rel="stylesheet">

<!--Bootstrap datepicker scripts-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

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

    .card {
        text-align: center;
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

    .btn {
        background-color: #007bff;
        margin: 2%;
    }

    .card-body {
        background-color: #889fa9;
        color: #fff;
    }

    html {
        background-color: #d6d6d6;
    }

    body {
        background-color: #d6d6d6;
    }
</style>

<?php
require_once '../tasklist/files/src.createTaskFrom.php';
require_once '../tasklist/files/src.showtask.php';
?>
<input type="hidden" id="useridInput" value="<?php echo $_SESSION['user']['id']; ?>">

<script>
    var calledittask = 1;
</script>


<body>
    <nav class="flex items-center justify-between flex-wrap bg-gray-800 p-6 fixed w-full z-10 top-0">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                <span class="text-2xl pl-2"><i class="em em-grinning"></i>tasklist</span>
            </a>
        </div>

        <div class="block lg:hidden">
            <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>

        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-white no-underline" href="#">Task</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-white no-underline" data-toggle="modal" data-target="#exampleModalCenter" href="">Create Task</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">user</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-white no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#" onclick="logout()">log out</a>
                </li>
            </ul>
        </div>
    </nav>


    <script>
        //Javascript to toggle the menu
        document.getElementById('nav-toggle').onclick = function() {
            document.getElementById("nav-content").classList.toggle("hidden");
        }
    </script>