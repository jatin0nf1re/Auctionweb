<section class="item-sec">
    <div class="text-center h1 text-main">Bid Items </div>
    <div class="d-flex mt-3 pt-3 h-75">
        <div class="d-flex flex-column w-25 align-items-center m-3">
            <button class="btn bg-main text-white m-2 w-100"> Active </button>
            <button class="btn bg-main text-white m-2 w-100"> Upcoming</button>
            <button class="btn bg-main text-white m-2 w-100"> Past</button>
            <form method="post" action="<?php echo base_url(); ?>items/validation" class="form m-3 rounded bg-white w-100 p-3">
                <div class="form-group">    
                    <label class="font-weight-bold">Select Category</label>
                    <select name="category" class="form-control m-2">
                    <option value="null">None</option>
                        <?php foreach($categories as $category){
                            echo '<option value="'.$category[0].'">'.$category[1].'</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <input type="submit" name="login" value="Apply" class="btn bg-main text-white ml-auto mx-3"/>
            </form>
        </div>
        <div class="rounded shadow bg-white w-75 h-100 overflow-auto m-3 p-2">
            <!-- <div class="m-2 rounded border bg-light shadow d-flex">
                <div class="w-25 m-2 border-right"><img src=""></div>
                <div class="w-75 p-2">
                    <div><b>Title - </b><span>ABCD</span></div>
                    <div><b>Start Price - </b><span>123</span></div>
                    <div><b>Start Date & Time - </b><span>ABCD</span></div>
                    <div><b>End Date & Time - </b><span>ABCD</span></div>
                    <a href="#" class="button btn bg-main text-white float-right m-2">Know More..</a>
                </div>
            </div> -->
            
            <?php foreach($items as $item){
                echo '<div class="m-2 rounded border shadow-lg d-flex">
                <div class="w-25 m-2 border-right"><img src="'.$item['ImagePath'].'" class="w-100" style="max-height:200px"></div>
                <div class="w-75 p-2 d-flex flex-column justify-content-between">
                    <div>
                        <div><b>Title - </b><span>'.$item['title'].'</span></div>
                        <div><b>Start Price - </b><span>'.$item['StartPrice'].'</span></div>
                        <div><b>Start Date & Time - </b><span>'.$item['StartTime'].'</span></div>
                        <div><b>End Date & Time - </b><span>'.$item['EndTime'].'</span></div>
                    </div>
                    <div>
                        <a href="'.base_url().'details?item='.$item['itemID'].'" class="button btn bg-main text-white float-right m-2">Know More..</a>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div> 
</section>


