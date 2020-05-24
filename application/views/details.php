<section class="item-details container my-3">
 <!-- <div class="text-center h1 text-main"></div> -->
<div class="d-flex w-100 rounded shadow bg-white p-3 m-3">
    <div class="m-2 p-2 border-right w-25"><img src="<?php echo $item->ImagePath; ?>" class="w-100"></div>
    <div class="d-flex flex-column w-75 m-2 p-2">
        <div class="h3"><?php echo $item->Title; ?></div>
        <p class="border-bottom m-2 p-2"><?php echo $item->Description; ?></p>
        <div class="text-info font-weight-bold mx-2 mt-2 px-2">Start Price - <?php echo $item->StartPrice; ?></div>
        <div class="text-success font-weight-bold mx-2 px-2">Current Bid - <?php echo $currentBid ?></div>
        <div class="font-weight-bold mx-2 px-2 h-2">Time Left -<span id="countdown"></span></div>
        <div class="text-danger font-weight-bold mx-2 px-2">End Date & Time - <?php echo $item->EndTime; ?></div>
    </div>
</div>

<?php
    if($this->session->flashdata('message')){
        echo '
        <div class="alert alert-success">
            '.$this->session->flashdata("message").'
        </div>
        ';
    }
?>  

<?php
if(date_create($item->StartTime)<date_create(date("d-m-Y H:i:s")) && date_create(date("d-m-Y H:i:s"))<date_create($item->EndTime)){
echo '<div class="m-3">
    <form action="'.base_url().'details/placeBid?item='.$item->itemID.'&currentBid='.$currentBid.'&currentBidder='.$item->currentBidder.'&startPrice='.$item->StartPrice.'" method="post" class="form w-50">
        <div class="form-group">
            <label class="font-weight-bold">Bid Amount</label>
            <input type="text " name="bidAmount" class="form-control custom-input shadow m-2" placeholder="Enter here" value="'.set_value("bidAmount").'"/>
            <span class="text-danger"><?php echo form_error("bidAmount"); ?></span>
        </div>
        <input type="submit" name="bid" value="Place Bid" class="btn text-white bg-success border m-auto round custom-btn" />
    </form>
</div>';
}?>
<div class="d-flex flex-column w-100 rounded shadow bg-white p-3 m-3">
    <h2>Comments</h2>
    <div class="m-2 p-2">
        <form method="post" action="<?php echo base_url(); ?>details/validation?item=<?php echo $item->itemID ?>"  class="form w-100">
            <div class="form-group form-inline">
                <label class="font-weight-bold">Rating(Out of 5)</label>
                <input type="number" class="form-control custom-input shadow m-2 border" name="rating" max="5" min="1"/>
            </div>
            <div class="form-group">
                <label class="font-weight-bold">Bid Amount</label>
                <textarea name="comment" class="form-control custom-input shadow m-2 border" value="<?php echo set_value('comment'); ?>">Write a comment here....</textarea>
                <span class="text-danger"><?php echo form_error('comment'); ?></span>
            </div>
            <input type="submit" name="feedback" value="Add Review" class="btn float-right m-auto round custom-btn" />
        </form>
    </div>
    <?php foreach($reviews as $review){
        echo '<div class="m-2 p-2">
        <div class="font-weight-bold">'.$review["membName"].'</div>
        <div class="mx-3 px-1 text-info border-left">'.$review["rating"].'</div>
        <div class="mx-3 px-1 border-left">'.$review["comment"].'</div>
    </div>';
    } ?>
    
</div>

</section>


<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $item->EndTime; ?>").getTime();
var start = new Date("<?php echo $item->StartTime; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "EXPIRED";
  }else if(now<start){
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "UPCOMING";
  }
}, 1000);
</script>