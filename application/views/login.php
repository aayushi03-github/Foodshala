  <?php 
  include 'layout/header.php';
  ?>
  <section class="archive-area " style="margin-left: 500px">
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
        <h4 class="mb-30">Log-In</h4>
          <form action="login" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <select class="form-control" name="type" required>
                <option value="0">Select type</option> 
                <option value="2">Restaurant Owner</option>
                <option value="1">Customer</option>
              </select>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="contact-email" placeholder="Email" required/>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
            </div>
            <button type="submit" name="submit" class="btn contact-btn" value="login">LogIn</button> 
          </form>
          <p>New User. <a href="signup">SignUp Here</a></p>
        </div>

      </div>
    </div>
    </div>
  </section>
  <?php 
  include 'layout/footer.php';
  ?>