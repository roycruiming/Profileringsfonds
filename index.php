<?php include('server.php')?>
<?php
if(isset($_GET['logout'])){session_destroy(); unset($_SESSION['user']); unset($_SESSION['id']); header('location: index.php');}?>

<!--123PHP.Test.Email123@gmail.com profilering-->


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

<body style="background: url(https://www.vippng.com/png/full/74-748222_abstraction-geometry-blue-turquoise-png-image-with-blue.png)">
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
    </form>
</nav>



<!-- jumbotron -->
<div class="jumbotron" style="background-image: url(https://image.freepik.com/free-vector/seamless-chaotic-square-pattern-background-vector-graphic-design-from-random-rotated-squares-with-opacity-effect_1164-1118.jpg);">
    <h1 class="display-3">Het Profileringsfonds</h1>
    <p class="lead">NHL Stenden University of Applied Sciences</p>
    <hr class="my-2">
    <p class="lead">
       <br><br><a class="btn btn-primary btn-lg" href="formulier.php" role="button">Start aanvraag</a>
    </p>
</div>
<div class="content">
<p id="main" style=" text-align: center; padding: 80px; margin-left: 100px; margin-right: 100px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consequatur corporis dignissimos et excepturi officiis perspiciatis quae quaerat quidem, reprehenderit? Autem dolore exercitationem magni non pariatur repellat repellendus reprehenderit sit.</span><span>Alias aspernatur beatae commodi cum cumque cupiditate debitis et ex, facilis fuga hic illo ipsam iste maiores minima nesciunt nulla odio pariatur possimus provident quam qui similique suscipit totam, voluptatibus?</span><span>Accusamus amet aspernatur aut culpa cum dolorum eaque enim facere, fuga harum impedit inventore maxime nesciunt nisi nobis officiis porro quo. Inventore porro qui repellat sequi! Corporis hic totam unde?</span><span>Alias animi architecto assumenda deserunt dolore ea fuga fugit harum itaque modi, nihil nostrum numquam perferendis praesentium quidem temporibus tenetur vel voluptatem. Adipisci facilis id illum modi officiis possimus voluptates.</span><span>Autem eligendi possimus vero voluptas. Distinctio laboriosam quis tenetur voluptas. Beatae consequatur deserunt dolorem enim eveniet fugit labore, laboriosam modi neque numquam officia omnis pariatur possimus qui quos rem suscipit.

<<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab atque distinctio dolorem eaque eius eligendi, ex expedita facilis id inventore numquam odit perspiciatis placeat qui sapiente suscipit, tenetur vel voluptatibus.</span><span>Error id ratione rerum. Corporis eligendi ex exercitationem incidunt labore suscipit ut velit. Cum delectus ducimus iusto, labore laborum modi pariatur perferendis quam repudiandae sapiente tempore tenetur unde veritatis vitae.</span><span>Aspernatur atque consequatur delectus deserunt dolor doloribus eaque eos incidunt itaque, nam nemo neque odit possimus, quasi qui quod ratione rem saepe sapiente soluta tempore temporibus tenetur unde voluptas voluptates.</span><span>Commodi dolore id in ipsam modi nobis perspiciatis quas quibusdam quis veniam? Adipisci ipsum iusto magnam placeat provident quae ratione totam unde? At, autem voluptates! Architecto commodi praesentium quaerat ratione?</span><span>Amet consequuntur iusto libero magnam quam quia repellendus similique soluta ullam veritatis. Aperiam culpa dolore et iure quaerat. Consequuntur culpa ea error hic illo minus quaerat quasi sequi totam voluptatum!</span><span>Alias consequatur dicta dolore eligendi eos iure laboriosam maiores minima mollitia, quas quis, tenetur vel. Ab alias amet delectus dicta error id, magnam nisi, nulla sint sunt temporibus voluptas voluptates.</span><span>A alias blanditiis corporis culpa deserunt dicta dolorem ea eos error, explicabo ipsum itaque laboriosam molestias nemo nisi nostrum numquam odio omnis placeat quisquam, recusandae sapiente sed tempora temporibus voluptate!</span><span>Beatae consequuntur, doloribus eos laborum modi natus nesciunt nihil nobis perspiciatis quia rem sed sint? Alias architecto, assumenda aut autem dicta, earum explicabo ipsam iure laborum, nostrum perspiciatis sit unde!</span><span>Beatae consequatur cupiditate debitis deleniti dolor dolorum eius ex excepturi expedita iusto laborum molestiae neque nesciunt, non officia optio pariatur praesentium quis reiciendis repellat sed tempora totam voluptates? Inventore, quos.</span><span>Accusantium aut consectetur cum cumque cupiditate, deserunt dignissimos, distinctio, dolorem dolorum eius eveniet ex excepturi itaque libero minima natus nesciunt nobis placeat porro quaerat quam ratione repellat reprehenderit voluptas voluptatem!</span><span>Dolorum ducimus iusto maxime recusandae rerum, similique voluptatibus! Architecto aspernatur autem consequuntur, dicta dolore explicabo facilis ipsum modi obcaecati, possimus quae quisquam, saepe similique ullam voluptatum! Assumenda ipsa perspiciatis reiciendis.</span><span>Beatae consequatur delectus dicta eveniet laudantium modi quas quod sunt, voluptatem! Ab ad aspernatur cumque, doloremque fuga inventore maiores maxime optio praesentium quasi qui quibusdam reprehenderit voluptate voluptates, voluptatibus! Assumenda.</span><span>Aspernatur eius reiciendis reprehenderit. Architecto, culpa cumque debitis delectus doloremque ducimus earum exercitationem expedita natus neque obcaecati odit quis repellendus repudiandae sequi tempora veniam voluptatem. Adipisci dolore minima saepe veniam?</span><span>Adipisci aliquam commodi debitis deleniti et eum exercitationem fuga, iure minus, nesciunt odit omnis placeat praesentium quisquam reprehenderit sunt, tempora. Accusamus asperiores beatae, consequuntur deleniti eius eum minima provident unde?</span><span>Ad commodi cupiditate dolores eum mollitia non quae quam repellat, sint velit. Alias corporis eos officia repudiandae totam? Blanditiis eos hic impedit incidunt iusto nisi praesentium quibusdam rem tempora veritatis.</span><span>Ab adipisci aperiam commodi consequatur cum esse ex, fugiat laborum, mollitia neque porro reiciendis reprehenderit sunt tempore, ullam. Accusantium aliquid at, debitis dignissimos explicabo facilis fugiat laborum placeat provident quibusdam!</span><span>Ab ad aliquid beatae cumque cupiditate dignissimos eaque enim, eveniet hic in incidunt labore magnam natus nobis officia officiis omnis porro quae qui, ratione reiciendis rerum sapiente sint temporibus voluptatem!</span><span>A, aliquam blanditiis consectetur debitis dolore doloremque dolores error id illo impedit in magnam maiores minus, molestiae molestias nulla officia pariatur provident quam quas quasi qui quibusdam sunt temporibus voluptas.</span><span>A ab adipisci atque doloremque eaque, explicabo inventore, ipsam labore, mollitia natus nulla odit quae qui sequi tempora! Amet corporis debitis delectus doloremque ea iste laborum magni minima recusandae temporibus.</span><span>Architecto atque commodi esse expedita illo incidunt iste itaque, voluptatem? Aperiam atque aut cumque dolores doloribus eius eum, harum ipsa ipsam obcaecati quae reprehenderit saepe vero! Labore libero tempore voluptatibus.</span>    </p>
</div>






<!-- Footer -->
<footer class="footer fixed-bottom">
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

