
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <a class="navbar-brand" href="#">Shakespeare</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
 
        <!--<li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
        </li>-->
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php 
        if(isset($_SESSION['user'])){
            echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\"> <i class=\"fas fa-user-circle\"></i> $user </a></li> ";
            echo "<li><a class=\"nav-link\" href=\"logout.php\"><i class=\"fas fa-sign-out-alt\"></i> Logout</a></li>";
        } else {
            echo "<li><a class=\"nav-link\" href=\"login.php\"><i class=\"fas fa-sign-in-alt\"></i> Login</a></li>";
            echo "<li><a class=\"nav-link\" href=\"create.php\"><i class=\"fas fa-user-plus\"></i> Register</a></li>";
        }
    ?>
    </ul>
    <!--<form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>-->
    </div>
</nav>