<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>FoodShala</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <!-- Bootstrap core CSS -->
<link href="<?php echo base_url()?>/assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>/assets/dashboard.css" rel="stylesheet">
     <link href="<?php echo base_url()?>/assets/css/responsive/responsive.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="signout">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link " href="dashboard">
              <span data-feather="home"></span>
              Dashboard 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="add_item">
              <span data-feather="file"></span>
              Add Menu Items <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="myitems">
              <span data-feather="users"></span>
             My items
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="view_order">
              <span data-feather="shopping-cart"></span>
              View Orders
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
       <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Add Food Item</h4>
     <form action="add_item" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6 mb-3">
            <input type="hidden" name="rid">
            <label for="firstName">Item name</label>
            <input type="text" class="form-control" id="firstName" name="item_name" required>
          </div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
          </div>
           <div class="col-md-6 mb-3">
            <label for="userfile">userfile</label>
            <input type="file" class="form-control" id="userfile" name="userfile" required>
          </div>

        <div class="col-md-6 mb-3">
          <label for="username">Veg or Non veg</label>
            <select class="form-control" name="category">
              <option value="veg">Veg</option>
              <option value="nonveg">non-Veg</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
          <label for="other">Other Description <span class="text-muted">(Optional)</span></label>
          <input type="text" name="other" class="form-control" id="other" placeholder="other Description about item">
        </div>
        <button class="btn btn-primary" type="submit" name="submit" value="Save">Save</button>
        </form>
        </div>
        <?php
      if(isset($this->session->userdata['msg'])) 
           { ?>
      <div id="fadeInMsg">
        <div class='alert alert-danger'>
        <?php echo ($this->session->userdata['msg']);
             unset($this->session->userdata['msg']); 
        ?> 
         </div> 
      </div>
      <?php } ?>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    </body>
</html>
