<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
    <script src="https://use.fontawesome.com/1cfa7bfbc4.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>Profile</title>
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
    
    <main>
      <div class="container">
       <div class="margin-maker">
            <div class="col-md-8">
                <div class="col-xs-12 ">
                    <h1 class="text-center">Profilsida $username</h1>
                </div>

                <div class="col-xs-4">
                    <div class="profilbild">IMG</div>
               </div>
                <div class="col-xs-8">
                    <div class="info_profile">
                    <p>Text</p>
                    <p>Text</p>
                    <p>Text</p>
                    <p>Text</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="col-xs-8">
                    <h2>$username Statistik</h2>
                </div>

                <div class="col-xs-6 col-md-12">
                    <div class="antal_posts">
                    <p>Totalt antal inlägg</p>
                    </div>
                </div>

                <div class="col-xs-6 col-md-12">
                    <div class="antal_kommentarer">
                    <p>Totalt antal kommentarer</p>
                    </div>
                </div> 
            </div>
            
            <div class="col-xs-12">
                <h1 class="text-center">Senaste 5 blogginlägg</h1>
            </div>
            <div class="col-xs-12">
                    <div class="posts">
                    <p>Inlägg 1</p>
                    <p>Inlägg 2</p>
                    <p>Inlägg 3</p>
                    <p>Inlägg 4</p>
                    <p>Inlägg 5</p>
                    </div>
            </div>
                
            <div class="col-xs-12">
                <h1 class="text-center">Senaste 5 Kommentarer</h1>
            </div>
            <div class="col-xs-12">
                    <div class="kommentarer">
                    <p>Kommentar 1</p>
                    <p>Kommentar 2</p>
                    <p>Kommentar 3</p>
                    <p>Kommentar 4</p>
                    <p>Kommentar 5</p>
                    </div>
                </div>
        
        </div><!--- slut div class margin-maker --->
      </div>  
    </main>
    
    
</body>
</html>