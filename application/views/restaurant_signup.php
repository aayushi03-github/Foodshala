  <?php 
  include 'layout/header.php';
  ?>
  <section class="archive-area "  style="margin-left: 500px">
    <div class="container">
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
    <div class="row">
      <div class="leave-comment-area  clearfix">
        <div class="comment-form">
        <h4 class="mb-30">Resgister your Restaurant Here</h4>
  
        
          <form action="restaurant_signup" method="post" enctype="multipart/form-data" id="form">
           <div class="form-group">
            <input type="text" class="form-control" name="restaurant_name" id="restaurant_name" placeholder="Restaurant name" required/>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="restaurant_type" id="restaurant_type" placeholder="Restaurant type" required>
          </div>
          <div class="form-group">
            <input type="address" class="form-control" name="address" id="address" placeholder="Address" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="contact-email" placeholder="xyz@gmail.com" required/>
             <div>
                  <b><?php echo form_error('email'); ?>
                  </b></div>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
          </div>
          <div class="form-group">
          <button type="submit" name="submit" class="btn contact-btn" value="Save">Save</button> 
          </div>
        </form>
        <p>Already have Account.<a href="login">Click here</a>to Log-in</p>
      </div>
                            </div>
    </div>
  </div>
</section>
<?php 
include 'layout/footer.php';
?>