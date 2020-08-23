
<style>
    /*dropdown mit search größe*/
    .select2-selection {
        min-height: 50px;
    }
    /*snackbar*/
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }
</style>
<script>
    function showSnackBar(text){
        var x = document.getElementById("snackbar");
        x.className = "show";
        x.innerText = text;
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-text mx-3">TASKLIST</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Angebote
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <?php if($_SESSION['user']['ismaster'] == 1) {?>
            <a class="nav-link" href="#" onclick="angeboteMaster()">
                <span>Alle Aufgaben</span></a>
        <?php } else { ?>
            <a class="nav-link" href="#" onclick="angeboteUser()">
                <span>Alle Aufgaben</span></a>
        <?php } ?>
    </li>



    <!-- Nav Item - Pages Collapse Menu -->
    <?php if($_SESSION['user']['ismaster'] == 1) {?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" onclick="getangeboteUser(3)">
                <span>Angebote Martin</span>
            </a>

        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" onclick="getangeboteUser(2)">
                <span>Angebote David</span>
            </a>
        </li>
    <?php } ?>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Verwalten
    </div>
    <?php if($_SESSION['user']['ismaster'] == 1) {?>
        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openartikel()">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Artikel verwalten</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openkunden()">
                <span>Kunden verwalten</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" onclick="openreferenzen()">
                <span>Referenzen verwalten</span></a>
        </li>
    <?php } ?>
    <li class="nav-item">
        <a class="nav-link" href="#" onclick="opennotizen()">
            <span>Notizen</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="#"  onClick="logout()">
            <i class="material-icons">&#xE15C;</i>
            <span>ABMELDEN</span></a>
    </li>

</ul>
<!-- End of Sidebar -->