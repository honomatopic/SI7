<?php
require_once ('_entetemenu.inc.php')
;
?>


<div class="jumbotron container">
    <title>C'est Calculnette</title>
</head>
<body>
    <img src="images/mrsgeek.jpg" />
    <h1>Salut c'est ton ami Calculnette</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"
          enctype="application/x-www-form-urlencoded"
          class="form-group col-md-8">
        <select name="nombre1">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select> <select name="choix">
            <option value="addition">+</option>
            <option value="soustraction">-</option>
        </select> <select name="nombre2">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>
        <button type="submit" class="btn btn-success" name="egal">=</button>
        <!--  -->
    </form>
    <br>
    <br>
    <a href="http://www.mangerbouger.fr/pour-qui-242/enfants/"><img
            src="images/mangerbouger.jpg" /> </a>
        <?php
        require_once ('calcul.traitement.php');
        ?>
</body>
<?php require_once ('_piedpage.inc.php'); ?>
</html>