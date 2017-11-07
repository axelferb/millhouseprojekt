<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <script src="https://use.fontawesome.com/1cfa7bfbc4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>DEMO-INDEX</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                </button>
                <a class="navbar-brand" href="#">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">HEM</a>
                    </li>
                    <li>
                        <a href="#">BLOG</a>
                    </li>
                    <li>
                        <a href="#">OM OSS</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="login.html">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRERA DIG</a>
                    </li>
                    <li>
                        <a href="login.html">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> LOGGA IN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <h1>HEROIMAGE</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="profilbild"></div>
                <h2>Blogginläggsrubrik 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi in hic ea nulla soluta sequi cumque maiores
                    exercitationem consequatur, sapiente quasi sunt fugiat aliquam? Repellat ea nesciunt culpa ipsam. Officia.</p>
            </div>
            <div class="hidden-xs hidden-sm col-md-4 index-login">
                <form>
                    <div class="form-group">
                        <label for="username">Användarnamn</label>
                        <input type="text" class="form-control" placeholder="Ditt användarnamn">
                    </div>
                    <div class="form-group">
                        <label for="password">Lösenord</label>
                        <input type="password" class="form-control" placeholder="Ditt lösenord">
                    </div>
                    <button type="submit" class="btn btn-primary">Logga in</button>
                </form>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="profilbild"></div>
                <h2>Blogginläggsrubrik 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi in hic ea nulla soluta sequi cumque maiores
                    exercitationem consequatur, sapiente quasi sunt fugiat aliquam? Repellat ea nesciunt culpa ipsam. Officia.</p>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="profilbild"></div>
                <h2>Blogginläggsrubrik 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi in hic ea nulla soluta sequi cumque maiores
                    exercitationem consequatur, sapiente quasi sunt fugiat aliquam? Repellat ea nesciunt culpa ipsam. Officia.</p>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="profilbild"></div>
                <h2>Blogginläggsrubrik 4</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi in hic ea nulla soluta sequi cumque maiores
                    exercitationem consequatur, sapiente quasi sunt fugiat aliquam? Repellat ea nesciunt culpa ipsam. Officia.</p>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="profilbild"></div>
                <h2>Blogginläggsrubrik 5</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi in hic ea nulla soluta sequi cumque maiores
                    exercitationem consequatur, sapiente quasi sunt fugiat aliquam? Repellat ea nesciunt culpa ipsam. Officia.</p>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>