

<h1 class="text-main text-center my-3 padding-2">School Login Portal</h1>

<div class="d-flex paddingy-2">
    <div class="d-flex flex-column justify-center align-items-center w-50 my-3 paddingy-2">
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
                <input type="text" name="user_code" class="form-control custom-input shadow m-2" id="school_codeInput" aria-describedby="emailHelp" placeholder="School Code" value="<?php echo set_value('user_code');?>">
                <span class="text-danger"><?php echo form_error('user_code') ?></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control custom-input shadow m-2" id="exampleInputPassword1" placeholder="Password" name="user_password" value="<?php echo set_value('user_password'); ?>">
                <span class="text-danger"><?php echo form_error('user_password') ?></span>
            </div>
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn text-main m-auto round custom-btn">Submit</button>
        </form>
    </div>
</div>

<div class="w-100 h-100 position-absolute" style="transform: translateY(-30rem)translateX(20rem)scale(0.75)">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1504.58 819.91">
        <defs>
            <style>
                .cls-1{fill:#082e47;}
            </style>
        </defs>
        <title>Asset 2</title>
        <g id="Layer_2" data-name="Layer 2">
            <g id="Layer_1-2" data-name="Layer 1">
                <path class="cls-1" d="M1504.58,15.48s-435.43-99.63-667.9,206.64S371.74,284.85,150.33,491.49,17.49,819.91,17.49,819.91l1487.09-92.25Z"/>
            </g>
        </g>
    </svg>
</div>








