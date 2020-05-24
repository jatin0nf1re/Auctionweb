<section class="item-sec">
    <div class="text-center h1 text-main">Sell A Item</div>
    <div class="m-3 p-3 h-75">
        <form method="post" action="<?php echo base_url(); ?>sellitems/validation" class="form m-3 w-100 p-3">
            <h2 class="text-main">Recieve Money in</h2>
            <div class="form-group col-md-4 p-3 m-3">    
                <label class="font-weight-bold">Bank Account No.</label>
                <input type="text" name="acc_no" placeholder="Enter here" value="<?php if($this->session->userdata('bank_acc')){echo $this->session->userdata('bank_acc');} ?>" class="form-control custom-input shadow m-2"/>
                <span class="text-danger"><?php echo form_error('acc_no'); ?></span>
            </div>
            <h2 class="text-main">Item Details</h2>
            <div class="form-group col-md-4 col-sm-12  p-3 m-3">
                <label class="font-weight-bold">Item Title</label>
                <input type="text " name="title" class="form-control custom-input shadow m-2" value="<?php echo set_value('title'); ?>"/>
                <span class="text-danger"><?php echo form_error('f_name'); ?></span>
            </div>
            <div class="form-group col-md-4 col-sm-12  p-3 m-3">    
                    <label class="font-weight-bold">Select Category</label>
                    <select name="category" class="form-control custom-input shadow m-2">
                        <option value="null">None</option>
                        <?php foreach($categories as $category){
                            echo '<option value="'.$category[0].'">'.$category[1].'</option>';
                        }
                        ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('category'); ?></span>
                </div>
            <div class="form-group col-md-6 col-sm-12  p-3 m-3">
                <label class="font-weight-bold">Item Image Link/Path</label>
                <input type="text " name="ImagePath" class="form-control custom-input shadow m-2" value="<?php echo set_value('ImagePath'); ?>"/>
                <span class="text-danger"><?php echo form_error('ImagePath'); ?></span>
            </div>
            <div class="form-group col-md-12 col-sm-12  p-3 m-3">
                <label class="font-weight-bold">Item Description</label>
                <textarea name="description" class="form-control custom-input shadow m-2" value="<?php echo set_value('description');?>">Write something about item</textarea>
                <span class="text-danger"><?php echo form_error('description'); ?></span>
            </div>
            <div class="form-group col-md-4 col-sm-6  p-3 m-3">
                <label class="font-weight-bold">Start Date And Time</label>
                <input type="datetime-local" name="start_time" class="form-control custom-input shadow m-2" value="<?php echo set_value('start_time'); ?>"/>
                <span class="text-danger"><?php echo form_error('start_time'); ?></span>
            </div>
            <div class="form-group col-md-4 col-sm-6  p-3 m-3">
                <label class="font-weight-bold">End Date ans Time</label>
                <input type="datetime-local" name="end_time" class="form-control custom-input shadow m-2" value="<?php echo set_value('end_time'); ?>"/>
                <span class="text-danger"><?php echo form_error('end_time'); ?></span>
            </div>
            <div class="form-group col-md-4 col-sm-4  p-3 m-3">
                <label class="font-weight-bold">Start Price(in Rupee)</label>
                <input type="number" name="start_price" class="form-control custom-input shadow m-2" value="<?php echo set_value('start_price');?>"/>
                <span class="text-danger"><?php echo form_error('start_price'); ?></span>
            </div>
            <div class="text-large font-weight-bold col-md-6 col-sm-12">
                <input type="checkbox" name="user_agreed"/>
                <span>I hereby agree to all the terms and conditions provided above</span>
            </div>
            <input type="submit" name="addItem" value="Add Item to Bid" class="if-checked btn text-white bg-main round custom-btn my-2 float-right"  disabled="true"/>
        </form>
            
    </div>
    </div> 
</section>

<script>
        console.log("hmm");
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                $('input.if-checked').attr('disabled',false);
            }
            else if($(this).is(":not(:checked)")){
                $('input.if-checked').attr('disabled',true);
            }
        });
</script>