
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta charset="utf-8">
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap theme -->
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="justified-nav.css" rel="stylesheet">
        <link rel="icon" href="../favicon.ico">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <!--script src="../../assets/js/ie-emulation-modes-warning.js"></script-->
        <title>Calculnette</title>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>    <nav class="navbar-fixed-top navbar">

        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand"></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">

                <?php if (isset($_SESSION["email"])): ?>
                    <div class="nav navbar-nav pull-right">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="navbar-form navbar-right" method="POST" enctype="application/x-www-form-urlencoded">
                            <span class="glyphicon glyphicon-user white xsTabulation"
                                  aria-hidden="true"> </span> 
                            <a href="inscription.php"
                               class="white"><span class="text-center white xsTabulation"><?php echo "Bienvenue  " . $_SESSION["email"]; ?>
                                </span> <span> <a href="<?php echo $_SERVER["PHP_SELF"]; ?>"
                                                  class="white">
                                        <button type="submit" name="deconnecter" class="btn btn-success"
                                                span class="glyphicon glyphicon-log-out " aria-hidden="true"
                                                title="log-out">Se déconnecter</button></span></a>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
            <!-- /.nav-collapse -->
        </div>
        <!-- /.container -->

    </nav>
</body>