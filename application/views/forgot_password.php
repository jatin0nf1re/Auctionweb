<div class="container">
    <h2 class="text-main text-center my-3 padding-2">Forgot Password?</h2>
    <?php
        if($this->session->flashdata('is_eligible')){
            echo '
            <div class="alert alert-danger">
                '.$this->session->flashdata("is_eligible").'
            </div>
            ';
        }
    ?>
    <form method= "post" action="<?php echo base_url(); ?>login/forgot_validation" class="d-flex justify-content-around w-100 flex-wrap">
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Enter school code (11-digit code)</label>
            <input type="text " name="school_code" class="form-control custom-input shadow m-2" value="<?php echo set_value('school_code'); ?>" maxlength="11"/>
            <span class="text-danger"><?php echo form_error('school_code'); ?></span>
        </div>
        <input type="submit" name="forgot_password" value="Next" class="btn text-main m-auto round custom-btn" />
    </form>
</div>