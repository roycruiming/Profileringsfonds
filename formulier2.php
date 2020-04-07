<?php include('server.php')?>
<?php include('update_formulier.php')?>
<?php
if(isset($_GET['logout'])){session_destroy(); unset($_SESSION['user']); unset($_SESSION['id']); header('location: index.php');}?>
<!DOCTYPE html>
<head>
    <title>Profileringsfonds landing page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/bootstrap-4.4.1-dist/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body style="background: url(images/bg-page-white.png) no-repeat center center fixed; background-size: cover; ">
<!-- navbar -->
<nav class="navbar navbar-expand-sm justify-content-between" >
    <!-- Links -->
    <div id="links">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="index.php">
                    <img src="images/Logo1.png" alt="logo" style="width:150px;">
                </a>
            </li>
            <li class="nav-item">
                <a method="post" class="nav-link" href="formulier.php" name="start_form">Start aanvraag</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="info.php">Informatie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="FAQ.php">FAQ</a>
            </li>

            <?php if (!isset($_SESSION['user'])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            <?php endif?>
            <?php if(isset($_SESSION['admin'])) : ?>
                <li>
                    <a class="nav-link" href="admin.php">admin</a>
                </li>
            <?php endif?>
            <li>
                <img src="images/globe.png" width="35px">
            </li>
            <li class="nav-item">
                <a  href="#" data-lang="nl">NL</a>
            </li>/
            <li class="nav-item" >
                <a  href="#" data-lang="en">ENG</a>
            </li>


            <?php if (isset($_SESSION['user'])) : ?>
                <div class="success" style="margin-left: 400px; margin-top: 45px; margin-bottom: 45px;">
                    <li class="nav-item" >
                        Ingelogd als <?php echo $_SESSION['user'];?> --- <a style="color: red" href="index.php?logout='1'">Log uit</a>
                    </li>
                </div>
            <?php endif?>
        </ul>
    </div>
    <form class="search form-inline my-2 my-lg-0" action="search.php">
        <input type="search" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</nav>

<div class="header">
    <h2>Persoonlijke gegevens</h2>
</div>
<?php
$datum = date("m.d.y");
$nummer = 0;
$query = "SELECT * FROM vragen WHERE id > 9 AND id < 16 ORDER BY id ASC";
$results = mysqli_query($conn, $query);
"<form class = form1 method='POST'>";
if (mysqli_num_rows($results) > 0) {
    while ($row = $results->fetch_assoc()) {
        $antwoorden = explode('|',$row['antwoorden']);
        $nummer += 1;
        if($row['antwoorden'] == null)
        {
            echo "<div align = 'center'><li>" . $row["vraag"] . "</li><input class='pass' type='text' name=$nummer></div>";
        }
        else{
            echo "<div align = 'center'><li>" . $row["vraag"] . "</li></div>";
            foreach ($antwoorden as $antwoord)
            {
                echo "<div align = 'center'><li><input type='radio' name='$nummer'><label>$antwoord</label></li></div>";
                echo "</div>";
            }
        }


    }
    echo "</form>";
}
?>
<a href="formulier3.php">Volgende pagina</a>
</form>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer text-center py-3 col-3">
                <a href="https://start.nhlstenden.com/">
                    <img src="images/Logo1.png" alt="logo" style="width:50px;">
                </a>
            </div>
            <div class="footer-copyright text-center py-3 col-3">© 2020 Copyright:
                <a href="https://nhlstenden.com/"> Nhlstenden.com</a>
            </div>
            <div class="footer text-center py-3 col-3">
                <a href="https://intranet.nhlstenden.com/" style="font-family: sans-serif; font-size: 20px; color: black">
                    <img src="images/intranetblue.png" alt="Intranet" style="width:50px">
                </a>
            </div>
            <div class="footer text-center py-3 col-3">
                <a href="https://trello.com/b/Aa0nRn8M/selecta">
                    <img src="images/selecta.png" alt="selecta" style="width:100px;">
                </a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>