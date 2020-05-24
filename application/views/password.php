<div class="container">
<h2 class="text-main text-center my-3 padding-2">Create Password</h2>
    <?php
        if($this->session->flashdata('password')){
            echo '
            <div class="alert alert-danger">
                '.$this->session->flashdata("password").'
            </div>
            ';
        }
    ?>

        <?php 
            if(current_url()== base_url().'login/password'){
                echo '<form method ="POST" action="'.base_url().'login/set_password" class="d-flex justify-content-around w-100 flex-wrap">';
            }else{
                echo '<form method ="POST" action="'.base_url().'register/set_password" class="d-flex justify-content-around w-100 flex-wrap">';
            }
        ?>
            <div class="form-group col-md-6 col-sm-12 p-2">
                <label class="font-weight-bold">Enter Password (min.length 6)</label>
                <input type="password" name="password" class="form-control custom-input shadow m-2" value="<?php echo set_value('password'); ?>"/>
                <span class="text-danger"><?php echo form_error('password'); ?></span>
            </div>
            <div class="form-group col-md-6 col-sm-12 p-2">
                <label class="font-weight-bold">Confirm Password</label>
                <input type="password" name="con_password" class="form-control custom-input shadow m-2" value="<?php echo set_value('con_password'); ?>"/>
                <span class="text-danger"><?php echo form_error('con_password'); ?></span>
            </div>
            <input type="submit" name="password_button" value="Done" class="btn text-main m-auto round custom-btn" />
    </form>
</div>
