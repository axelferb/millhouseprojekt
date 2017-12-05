<nav class="navbar navbar-inverse">
    <a href="index.php"><div class="brand-logo"></div></a>
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li>
                    <a href="index.php">HEM</a>
                </li>
                <li>
                    <a href="blog.php">BLOGG</a>
                </li>
                <li>
                    <a href="om_oss.php">OM OSS</a>
                </li>
                
                <?php if(isset($_SESSION["user"])){ ?>
                <li>
                    <a href="profilepage.php">DIN PROFILSIDA</a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <!-- END CONTAINER-FLUID -->
    </div>
</nav>
<div class="blue-line"></div>