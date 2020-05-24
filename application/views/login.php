
<div class="position-relative">
    <h1 class="text-main text-center my-3 padding-2">Online Auction System</h1>
    <div class="text-small m-3 text-center">
            <span class="h3 text-white m-3">New To Site?</span><a href="/auction/register" class="button btn text-main m-auto round custom-btn">Register</a>
    </div>
    <div class="d-flex paddingy-2">
        <div class="d-flex flex-column justify-center align-items-center col-md-6 col-sm-9 my-3 paddingy-2">
            <h2><div class="my-3 text-center">Login</div></h2>
            <?php
                if($this->session->flashdata('message')){
                    echo '
                    <div class="alert alert-success">
                        '.$this->session->flashdata("message").'
                    </div>
                    ';
                }
            ?>
            <form method="post" action="<?php echo base_url(); ?>login/validation" class="d-flex flex-column justify-center w-75">
                <div class="form-group">
                    <input type="text" name="email" class="form-control custom-input shadow m-1" id="email" placeholder="Enter Email" value="<?php echo set_value('school_code');?>">
                    <span class="text-danger text-small"><?php echo form_error('school_code') ?></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control custom-input shadow m-1" placeholder="Password " name="password">
                    <span class="text-danger text-small"><?php echo form_error('password') ?></span>
                </div>
                <!-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <input type="submit" name="login" value="Login" class="btn text-main m-auto round custom-btn"/>
            </form>
        </div>
        <div class="d-flex w-50 justify-content-center">
            <img src="assets/img/22060.png" class="w-75 h-75 mx-3" />
        </div>
    </div>
</div>








