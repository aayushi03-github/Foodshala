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
            <a class="nav-link" href="add_item">
              <span data-feather="file"></span>
              Add Menu Items
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="myitems">
              <span data-feather="users"></span>
             My items <span class="sr-only">(current)</span>
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

      <h2>Available Items</h2>
      <div class="table-responsive">
        <table class="table table-striped ">
          <thead>
            <tr>
              <th>Sno</th>
              <th>Item Name</th>
              <th>category</th>
              <th>price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <?php
          $sno =1;
          if($itemList !=0)
          {  foreach ($itemList as $row ) {
           ?>
          <tbody>
            <tr>
              <td><?php  echo $sno++; ?></td>
              <td><?php echo $row['item_name'];?></td>
              <td><?php echo $row['category'];?></td>
              <td><?php echo $row['price'];?></td>
              <td><a  href="<?php echo base_url().'delete_item/'.$row['item_id'];?>" onclick="return confirm('Are you Sure want to delete this item');">
                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                         delete </a></td>
            </tr>
          </tbody>
          <?php } 
          }?>
        </table>
      </div>
      
       </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    </body>
</html>
