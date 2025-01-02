<?php

try{/**/
 $db= new PDO ("mysql:host=localhost;dbname=ecommerce;chraset=utf8","root","root");
 $db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
}
catch(Exception	$e){
    $e->getMessage ();
}

$req =$db->prepare("SELECT * FROM products ORDER BY id DESC");
$req->execute();
$data = $req->fetchAll(PDO::FETCH_OBJ);
$req->closeCursor();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Toys</title>
    <link rel="stylesheet" href="DogStylee.css"> <!-- External CSS file -->
</head>

<body>

    <!-- Header with logo and navigation -->
    <header>
        <div class="container">
            <div class="logo">
                <h1>Dog Toys</h1>
            </div>
            <img src="Shoppingcart.png"/>
            <a href="inscription.php">Connection</a>
            <a href="#2">Inscription</a>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main banner section -->
    <section id="home" class="banner">
        <div class="container2">
            <h2>Best Toys for Your Furry Friends</h2>
            <p>Explore our wide range of toys that your dogs will love!</p>
            <a href="#shop" class="btn">Shop Now</a>
        </div>
    </section>

    <!-- Product section -->
     
    
        <section id="shop" class="products">
            <div class="container">
                <h2>Shop Our Collection</h2>
                <div class="product-list">
    <?php foreach ($data as  $value) :
        # code...
    ?>
                <form method="post">
                        <div class="product">
                            <img src=<?= $value->image?> alt=<?= $value->name?> /> <!--IMAGESURCETTELINE-->
                            <h3><?= $value->name?></h3>
                            <p><?= $value->price?> $</p>
                            <p><?= $value->stock?> Left</p>
                            <button>Add to Cart</button>
                        </div>
                </form>
    <?php endforeach;
    ?>
                </div>
            </div>
    </section>

    <!-- About section -->
    <section id="about">
        <div class="container">
            <h2>About Us</h2>
            <p>Dog Toys is a premium provider of fun, safe, and durable toys for dogs of all sizes. Our goal is to make sure your furry friend has the best experience with toys that last.</p>
        </div>
    </section>

    <!-- Footer section -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Dog Toys. All rights reserved.</p>
            <p>Follow us on: <!-- a faire -->
                <a href="#">Facebook</a> |
                <a href="#">Instagram</a> |
                <a href="#">Twitter</a>
            </p>
        </div>
    </footer>

</body>

</html>