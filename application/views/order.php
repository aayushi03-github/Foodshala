<?php 
include 'layout/header.php';
?>

<section class="archive-area">
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
        <div class="container">
            <div class="row">
            <?php
            if($orderData !=0){
                foreach ($orderData as $key) {?>
                      <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post wow fadeInUp" data-wow-delay="0.1s">
                        <!-- Post Thumb -->
                        <div class="post-thumb">
                           <img src="<?php echo base_url().'assets/uploads/'.$key['image']?>"  width="200px" height="200px" alt="">
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                                <h4 class="post-headline"><?php echo $key['item_name']?></h4>
                                <p><?php echo $key['restaurant_name'];?></p>
                            <p>Rs.<?php echo $key['price']?>  </p>
                         <form method="post" action="<?php echo base_url('order/'.$key['item_id']);?>">
                     <button type="submit" name="submit" value="Checkout" class="btn btn contact-btn">Checkout</button>
                </form> 
                        </div>
                    </div>
                </div>
                      <?php }
    }
    ?>
        </div>
        </div>
        <?php if($this->session->userdata('success')){?>

        <div class="alert alert-success">
            <?php echo $this->session->userdata('success');?>
        </div>
        <?php } elseif ($this->session->userdata('msg')) { ?>
            <div class="alert alert-danger">
            <?php echo $this->session->userdata('msg');?>
        </div>
      <?php  } ?>

    </section>
<?php
include 'layout/footer.php';
?>