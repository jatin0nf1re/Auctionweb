<div class="container">
    <h2 class="text-main text-center my-3 padding-2">Register</h2>
    <?php
        if($this->session->flashdata('is_eligible')){
            echo '
            <div class="alert alert-danger">
                '.$this->session->flashdata("is_eligible").'
            </div>
            ';
        }
    ?>
    <form method= "post" action="<?php echo base_url(); ?>register/validation" class="d-flex justify-content-around w-100 flex-wrap">
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">First Name</label>
            <input type="text " name="f_name" class="form-control custom-input shadow m-2" value="<?php echo set_value('f_name'); ?>" maxlength="11"/>
            <span class="text-danger"><?php echo form_error('f_name'); ?></span>
        </div>
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Last Name</label>
            <input type="text" name="l_name" class="form-control custom-input shadow m-2" value="<?php echo set_value('l_name'); ?>"/>
            <span class="text-danger"><?php echo form_error('l_name'); ?></span>
        </div>

        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Email</label>
            <input type="text" name="email" class="form-control custom-input shadow m-2" value="<?php echo set_value('email'); ?>"/>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
        </div>

        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Password</label>
            <input type="password" name="password" class="form-control custom-input shadow m-2" value="<?php echo set_value('password'); ?>"/>
            <span class="text-danger"><?php echo form_error('password'); ?></span>
        </div>
        
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Mobile Number</label>
            <input type="number" name="mobnumber" class="form-control custom-input shadow m-2" value="<?php echo set_value('mobnumber');?>"  maxlength="10"/>
            <span class="text-danger"><?php echo form_error('mobnumber'); ?></span>
        </div>

        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Alternate Mobile Number</label>
            <input type="number" name="altmobnumber" class="form-control custom-input shadow m-2" value="<?php echo set_value('altmobnumber');?>"  maxlength="10"/>
            <span class="text-danger"><?php echo form_error('altmobnumber'); ?></span>
        </div>

        <div class="form-group col-md-12 col-sm-12 p-2">
            <label class="font-weight-bold">Address</label>
            <textarea name="address" class="form-control custom-input shadow m-2" value="<?php echo set_value('address');?>"></textarea>
            <span class="text-danger"><?php echo form_error('address'); ?></span>
        </div>
        <input type="submit" name="register" value="Register" class="btn text-main m-auto round custom-btn" />
    </form>
</div>