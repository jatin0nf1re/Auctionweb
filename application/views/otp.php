<div class="container">
<h2 class="text-main text-center my-3 padding-2">Verify OTP</h2>
    <?php
        if($this->session->flashdata('message')){
            echo '
            <div class="alert alert-danger">
                '.$this->session->flashdata("message").'
            </div>
            ';
        }
    ?>

    <?php 
        if(current_url()== base_url().'login/otp'){
            echo '<form method ="POST" action= "'.base_url().'login/verify_otp" class="d-flex justify-content-around w-100 flex-wrap">';
        }else{
            echo '<form method ="POST" action="'.base_url().'register/verify_otp" class="d-flex justify-content-around w-100 flex-wrap">';
        }
    ?>
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Enter OTP sent on mobile</label>
            <input type="number" name="otp" class="form-control custom-input shadow m-2" value="<?php echo set_value('otp'); ?>"/>
            <span class="text-danger"><?php echo form_error('otp'); ?></span>
        </div>
        <input type="submit" name="submit_otp" value="Verify" class="btn text-main m-auto round custom-btn" />
        <button class="btn text-main m-auto round custom-btn" href="<?php echo base_url(); ?>register/send_otp">Resend</button>
    </form>
</div>