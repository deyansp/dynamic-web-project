<?php 
    session_start();
    // preventing unauthorised access
    if(!isset($_COOKIE['name']) || !isset($_SESSION['email'])) {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kesha | Official Website</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    
    <script src="script/navbar-colour.js"></script>
    <script src="script/navbar-overlay.js"></script>
    <script src="script/userFormSubmission.js"></script>
    <script src="script/jqueryPluginStart.js"></script>
    <script src="script/tourDatesAjax.js"></script>
    <script src="script/password.min.js"></script>
    <script src="script/countdown.js"></script>
    <script src="script/cookie.js"></script>
    
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/password.min.css"/>
</head>

<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" alt="home">KESHA</a>

            <button id="button" class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarOverlay">
                <span class="navbar-toggler-icon ml-auto"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarOverlay">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about-section">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#ticket-section">Get Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="script/logOut.php">Sign Out</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    
    <!--Modal Log In/Register form-->
    <div id="logInModal" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#logIn">Log In</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#signUp">Sign Up</a></li>
                    </ul>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="logIn" class="tab-pane active">
                            <form role="form" method="post" action="script/login.php">
                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                  <label for="psw">Password</label>
                                  <input type="password" class="form-control" name="psw" placeholder="Enter password" required>
                                </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="" checked> Stay logged in</label>
                                </div>
                                <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Log In</button>
                           </form>
                         </div>
                        
                        <div id="signUp" class="tab-pane fade">
                            <form role="form" method="post" action="script/signup.php">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" name="firstName" placeholder="Enter first name" required>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" name="lastName" placeholder="Enter last name" required>
                            </div>
                            <div class="form-group">
                                <label for="newEmail">Email</label>
                                <input type="email" class="form-control" name="newEmail" placeholder="Enter email address" required>
                            </div>
                            <div class="form-group">
                                <label for="newPsw">Password</label>
                                <input type="password" class="form-control" id="signUpPass" name="newPsw" placeholder="Enter new password" required minlength=6>
                            </div>
                                <div class="checkbox">
                                  <label><input type="checkbox" value="" required> I accept the <a data-toggle="modal" href="#PrivacyPolicy">Privacy Policy</a></label>
                                </div>
                                <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span>Sign Up</button>
                            </form>
                        </div>
                    </div>
                </div> <!--modal-body-->
            </div>
        </div>
    </div>

    <!--Image Slideshow-->
    <div id="slides" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/1.jpg" />
                <div class="carousel-caption">
                    <h3>Tour<br>Tickets Available</h3>
                    <a href="#ticket-section"><button type="button" class="btn btn-success btn-lg">Buy Now</button></a>
                </div>
            </div>

            <div class="carousel-item">
                <img src="images/2.jpg" />
                <div class="carousel-caption">
                    <h3>Join<br>The Community</h3>
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" href="#logInModal">Sign Up</button>
                </div>
            </div>

            <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!--About Section-->
    <div class= "container-fluid" id="about-section">
        <div class="row">
            <div class ="col-12 content-heading">
                <h2 class = "display-4 text-center">About</h2>
                <hr class = "my-4">
            </div>
        </div>
        <div class = "container">
            <div class = "row">
                <div class="col-md-6">
                    <img class = "img-fluid rounded-circle" src ="images/about.jpg"  alt = "about image">
                </div>
                <div class="col-md-6 about-text">
                    <p class="text-justify">
                    A brash and driven pop singer/songwriter, Kesha was born in Los Angeles but moved to Nashville when she was four,
                    where her mother -- a longtime songwriter -- had inked a publishing deal. Before finishing high school,
                    Kesha returned to L.A. for the sake of jump-starting her own music career,
                    despite being set up to study psychology at Columbia. The biggest turning point came one year later,
                    when she was tapped to contribute vocals to Flo Rida's "Right Round," a number one Hot 100 hit.
                    Kesha subsequently signed to RCA, and her debut album, Animal was released in early 2010.
                    reaching the top of the Billboard 200 and spinning off the number one single "TiK ToK.
                    In January 2018, Kesha picked up two Grammy nominations, including Best Pop Vocal album for Rainbow, and Best Pop Solo Performance for "Praying."
                    </p>
            </div>
          </div>
    </div>
    </div>
    
    <!--Tour Tickets-->
    <div class= "container-fluid" id="ticket-section">
        <div class="row">
            <div class ="col-12 content-heading">
                <h2 class = "display-4 text-center"><?php echo $_COOKIE["name"] . ", See Kesha On Tour";?></h2>
                <hr class = "my-4">
            </div>
        </div>
        <div class = "container">
            <div class="row ticketCards">
                <div class="col-md-4">
                    <div class="card">
                         <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-calendar-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-clock"></i> </p>
                            <a href="#" class="btn btn-success">Purchase</a>
                          </div>
                          <div class="card-footer"></div>
                    </div>
                </div>
             <div class="col-md-4">
                    <div class="card">
                         <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-calendar-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-clock"></i> </p>
                            <a href="#" class="btn btn-success">Purchase</a>
                          </div>
                          <div class="card-footer"></div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="card">
                         <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-calendar-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-clock"></i> </p>
                            <a href="#" class="btn btn-success">Purchase</a>
                          </div>
                          <div class="card-footer"></div>
                    </div>
                </div>
            </div>
            
            <div class="row ticketCards">
                <div class="col-md-4">
                    <div class="card">
                         <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-calendar-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-clock"></i> </p>
                            <a href="#" class="btn btn-success">Purchase</a>
                          </div>
                          <div class="card-footer"></div>
                    </div>
                </div>
             <div class="col-md-4">
                    <div class="card">
                         <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-calendar-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-clock"></i> </p>
                            <a href="#" class="btn btn-success">Purchase</a>
                          </div>
                          <div class="card-footer"></div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="card">
                         <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-calendar-alt"></i> </p>
                            <p class="card-text"><i class="fas fa-clock"></i> </p>
                            <a href="#" class="btn btn-success">Purchase</a>
                          </div>
                          <div class="card-footer"></div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <!--Privacy Policy Modal-->
    <div id="PrivacyPolicy" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h4>Privacy and Cookie Policy</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    
                <div class="modal-body">
                    <h6>Introduction</h6>
                    <p>Please read this notice in full and ensure that you understand how we store and proccess personal data.</p> 

                    <h6>What information do we collect?</h6>
                    <p>We collect names, email and password when you register on our website and we keep a record of any ticket purchases you have made.</p>
                    <h6>How do we use personal information?</h6>
                    <p>We process your data for the following purposes: account set up and administration; providing goods and services</p>

                    <h6>Where do we store and process personal data?</h6>
                    <p>We store your data on our servers in the UK. We do not process or store your data outside of the UK. The data we collect is not shared with third parties.</p>

                    <h6>How do we secure personal data?</h6>
                    <p>Personal data is encrypted and our servers have adequate measures: to protect data against accidental loss; to prevent unauthorised access, use, destruction or disclosure; to restrict access to personal information </p>

                    <h6>How long do we keep your personal data for?</h6>
                    <p>We store your log-in data for a period no longer than reasonably necessary. Records of ticket purchases made are kept for a year after the event has ended.</p>

                    <h6>Use of cookies and other technologies</h6>
                    <p>We use cookies to provide personalisation and to maintain login sessions. We do not use third party cookies.
                    Your rights in relation to personal data
                        Under the GDPR, we must respect the right of data subjects to access and control their personal data. At any given moment you can request access to the personal information we store about you. You can request to have the data corrected or deleted from our records. To do so, please contact us using the details provided in the section below.</p>

                    <h6>How to contact us?</h6>
                    <p>If you have questions or concerns regarding our privacy practices, your personal information, or if you wish to file a complaint. Contact us by email at admin@loremipsum.com</p>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--Footer-->
    <footer>
        <a href="#about-section">About</a>
        <a data-toggle="modal" href="#PrivacyPolicy">Privacy Policy</a>
        <a href="#">Contact</a>
        <p>© <?php echo date("Y"); ?> Made By Deyan Spasov</p>
    </footer>
</body>
</html>