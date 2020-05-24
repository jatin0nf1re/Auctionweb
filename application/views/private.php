<section class="dashboard">
    <div class="text-center h1 text-main">Dashboard</div>
    <div class="m-3 p-3 bg-white rounded shadow">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#home">Your Bids</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#menu1">Your Items</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#menu2">Your Profile</a>
        </li>
    </ul>
    <hr>
    <!-- Tab panes -->
    <div class="tab-content">

    <!-- Menu 0 -->
    <div class="tab-pane container active" id="home">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Item ID</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bids as $bid){
                    echo '<tr>
                    <th scope="row"><a href="'.base_url().'details?item='.$bid['itemID'].'" class="button btn bg-info text-white">'.$bid['itemID'].'</a></th>
                    <td>'.$bid['price'].'</td>';
                    if($bid['result']==1){
                        echo '<td>Won</td>';
                    }else if($bid['result']==2){
                        echo '<td>Winning</td>';
                    }else if($bid['result']==3){
                        echo '<td>Lost</td>';
                    }else{
                        echo '<td>Losing</td>';
                    };
                    if($bid['result']==1){
                        if($this->item_model->getPayStatus($bid['itemID'])){
                            echo '<td>Paid</td>';
                        }else{
                            echo '<td><a href="'.base_url().'dashboard/pay?item='.$bid['itemID'].'" class="button btn bg-success text-white">Pay</a></td>'; 
                        }
                    }else if($bid['result']==2){
                        echo '<td></td>';
                    }else if($bid['result']==3){
                        echo '<td></td>';
                    }else{
                        echo '<td><a href="'.base_url().'details?item='.$bid['itemID'].'" class="button btn bg-primary text-white">Place Bid</a></td>';
                    };
                    echo '</tr>';
                } ?>
            </tbody>
        </table>
    </div>
    
    <!-- Menu 1 -->
    <div class="tab-pane container fade" id="menu1">
    <table class="table">
            <thead>
                <tr>
                <th scope="col">Item Name</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Start Price</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($sellItems as $item){
                    echo '<tr>
                    <th scope="row">'.$item->Title.'</th>
                    <td>'.$item->StartTime.'</td>
                    <td>'.$item->EndTime.'</td>
                    <td>'.$item->StartPrice.'</td>
                    <td><a href="'.base_url().'details?item='.$item->itemID.'" class="button btn btn-primary">More Info</a></td>';
                } ?>
            </tbody>
        </table>
    </div>
    
    
    <!-- Menu 2 -->
    <div class="tab-pane container fade" id="menu2">
        <div>
            <b>First Name -</b>  <?php echo $this->session->userdata('f_name'); ?>
        </div>
        <div>
            <b>Last Name -</b>  <?php echo $this->session->userdata('l_name'); ?>
        </div>
        <div>
            <b>Email Address -</b>  <?php echo $this->session->userdata('email'); ?>
        </div>
        <div>
            <b>Home Address -</b>  <?php echo $this->session->userdata('address'); ?>
        </div>
        <div>
            <b>Registered Phone Numbers-</b>
            <?php for($i=0; $i<count($phone_number); $i++){
                echo '<li>'
                .$phone_number[$i].
            '</li>';
            }
            ?>
        </div>
        
    </div>
    </div>

</section>

