<!DOCTYPE html>
<html>
<head>
<?php include('h.php');
error_reporting( error_reporting() & ~E_NOTICE );
?>
<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
<head>
  
  <body>
    
    <div class="container">
    <div class="row">
      <div class="col-md-3">
      </nav>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.png" alt="" /></span>
            <h3>Hi ! <?php echo $_SESSION['m_name'];?></h3>
            <a href="cart.php"><span class="btn badge-dark">WorkShop</span></a>
            <br>
            <a href="product.php"><span class="btn badge-dark">Edit Product</span></a>
            <br>
            <a href="logout.php"><span class="btn badge-dark">Logout</span></a>
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
            </div>        
        </nav>
      </div>
      <div class="col-md-12">
      <a href="product.php?act=add" class="btn-info btn-sm">Add</a>
      <P></P>
      <?php
        $act = $_GET['act'];
        if($act == 'add'){
        include('product_form_add.php');
        }elseif ($act == 'edit') {
        include('product_form_edit.php');
        }
        else {
        include('product_list.php');
        }
        ?>
      </div>
    </div>
  </div>
  </body>
</html>