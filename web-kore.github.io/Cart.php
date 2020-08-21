<?php

include('h.php');
    $database_name = "test";
    $con = mysqli_connect("localhost","root","",$database_name);
    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                        'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"]   [$count] = $item_array;

            }else{   
                $position = array_search($_GET["id"],$item_array_id);
                $_SESSION["cart"][$position]['item_quantity'] += 1;
                echo '<script>window.location="Cart.php"</script>'; 
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>window.location="Cart.php"</script>';
                }
            }
        }
    }
?>

<!doctype html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #9f4e2f;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
        .btn-brown{
            background-color: #9f4e2f;
        }
        .btn-brown:hover {
            color: #fff;
            background-color: #9f4e2f;
            border-color: #964a2c;
        }
        ..container {
            width: 100%;
            padding-right: 0.75rem;
            padding-left: 0.75rem;
            margin-right: auto;
            margin-left: auto;
        }
        .img_responsive{
            width:100%;
            height:auto;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
<div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="10%">Product</th>
                <th width="10%">Quantity</th>
                <th width="10%">Price</th>
                <th width="10%">Total</th>
                <th width="10%">Delete</th>
            </tr>
            <?php
            $total = 0;
                if(!empty($_SESSION["cart"])){
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>    
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td><?php echo $value["product_price"]; ?>฿</td>
                            <td><?php echo number_format($value["item_quantity"] * $value["product_price"], 0); ?>฿</td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="badge badge-danger">Remove Item</span></a></td>
                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]); 
                    }
                        ?>
                        <tr>
                            <td colspan="1" align="right">Total</td>
                            <th align="right"><?php echo number_format($total, 0); ?>฿</th>
                            <td></td>
                        </tr>
                        <?php
                }
                ?>
            </table>
</div> 

        </nav>
        <form method="post" action="">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.png" alt="" /></span>
            <h3>Hi ! <?php echo $_SESSION['m_name'];?></h3>
            <a href="cart.php"><span class="btn badge-dark">WorkShop</span></a>
            <br>
            <a href="product.php"><span class="btn badge-dark">Edit Product</span></a>
            <br>
            <a href="logout.php"><span class="btn badge-dark">Logout</span></a> <br>

            <a class="navbar-brand js-scroll-trigger" href="#page-top">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            </div>        
        </nav>
        </form>
    <div class="row">
                
        <?php
            $query = "SELECT * FROM tbl_product_show where by_user='".$_SESSION['m_name']."' ORDER BY p_id ASC ";
            $result = mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-sm">
                        
                        <form method="post" action="Cart.php?action=add&id=<?php echo $row["p_id"]; ?>">
                            <button class="btn bg-primary"name="add"value="Add to Cart"type="submit" style="width: 100%;">
                                <div class="card-body">
                                    <img src="p_img/<?php echo $row["p_img"]; ?>" class="img_responsive">
                                    <h5 class="card-title"><?php echo $row["p_name"]; ?></h5>
                                    <h5 class="card-title"><?php echo $row["price"]; ?>฿</h5>
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="change" value="<?php echo $row["price"]; ?>">
                                    <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
                                    <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                </div>
                            </button>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
    </div>
    <script src="func.js"></script> 
</body>
</html>
