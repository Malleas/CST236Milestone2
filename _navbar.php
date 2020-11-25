<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">CST236</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/Milestone/index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php
            if(isset($_SESSION['userID']) && $_SESSION['role'] == 4){
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/Milestone/presentation/views/user/UserAdmin.php">Users</a>
                        <a class="dropdown-item" href="/Milestone/presentation/views/product/ProductAdmin.php">Products</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/Milestone/presentation/views/product/NewProduct.php">Add New Product</a>
                    </div>
                </li>
            <?php
            }
            ?>

        </ul>

        <form class="form-inline my-2 my-lg-0" action="presentation/handlers/product/SearchHandler.php" method="post">
            <input class="form-control mr-sm-2" name="navSearch" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <?php
        if(!isset($_SESSION['userID'])){
            ?>
            <form class="form-inline my-2 my-lg-0" action="/Milestone/presentation/views/login/Login.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log In</button>
            </form>
        <?php
        }else{
            ?>
            <form class="form-inline my-2 my-lg-0" action="/Milestone/presentation/views/login/Logout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log Out</button>
            </form>
        <?php
        }
        ?>

    </div>
</nav>