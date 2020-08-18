  <?php 
  include 'layout/header.php';
  ?>
  <section class="archive-area section_padding_80">
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

          <!-- Contact Form  -->
        
                <div class="contact-form">
                    <h2 class="contact-form-title mb-30">Customer Registration</h2>
                    <!-- Contact Form -->
                    <form action="customer_signup" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                    <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="customer name" required>
                </div>
                <div class="form-group">
                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="phone number" required>
                      <div>
                 <b><?php echo form_error('phone'); ?></b> 
                  </div>
                </div>
                 <div class="form-group">
                    <input type="address" class="form-control" name="address" id="address" placeholder="address number" required>
                </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="contact-email" placeholder="xyz@gmail.com" required/>
                          <div>
                <b>  <?php echo form_error('email'); ?></b>
                  </div>
                    </div>
                     <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                </div>
                   <button type="submit" name="submit" class="btn btn-primary" value="Submit">Save</button> 
                </form>
                <p>Already have Account.Click Here<a href="login">to Log-in</a></p>
            </div>
  
</div>
</div>
</section>
<?php 
include 'layout/footer.php';
?>