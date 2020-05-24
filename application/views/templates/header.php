<html>
    <head>
        <title>Online Auction Site</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        

    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-transparent pt-3">
      <a class="navbar-brand" href="<?php echo base_url();?>"><b>Auction Web</b></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link text-main text-bold px-2 mx-2" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link button btn bg-main text-white px-3 mx-2" href="<?php echo base_url();?>sellitems">Sell</a>
          </li>
          <li class="nav-item">
            <a class="nav-link button btn bg-main text-white px-3 mx-2" href="<?php echo base_url();?>items">Bid</a>
          </li>
          <?php if($this->session->userdata('memb_ID')){
              echo '<li class="nav-item">
              <a class="nav-link text-dark nav-font ml-3" href="'.base_url().'dashboard/logout">LOGOUT</a>
            </li>';
          }elseif(current_url()== base_url().'register'){
              echo '<li class="nav-item">
            <a class="nav-link text-dark nav-font ml-3" href="'.base_url().'login">LOGIN</a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link text-dark nav-font ml-3" href="'.base_url().'register">REGISTER</a>
          </li>';
          }
          ?>
        </ul>
      </div>
    </nav>

    <!-- <nav class="navbar navbar-light bg-inverse navbar-expand-lg">
      <a class="navbar-brand text-main px-2 m-0" href="#"><div>Auction Web</div><div></div></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto navbar-right">
          <li class="nav-item active">
            <a class="nav-link text-dark nav-font ml-3" href="<?php echo base_url(); ?>">HOME<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark nav-font ml-3" href="<?php echo base_url(); ?>/about">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark nav-font ml-3" href="<?php echo base_url(); ?>/posts">CONTACT US</a>
          </li>
          <?php if($this->session->userdata('school_code')){
              echo '<li class="nav-item">
              <a class="nav-link text-dark nav-font ml-3" href="'.base_url().'private_area/logout">LOGOUT</a>
            </li>';
          }elseif(current_url()== base_url().'register'){
              echo '<li class="nav-item">
            <a class="nav-link text-dark nav-font ml-3" href="'.base_url().'login">LOGIN</a>
          </li>';
          }else{
            echo '<li class="nav-item">
            <a class="nav-link text-dark nav-font ml-3" href="'.base_url().'register">REGISTER</a>
          </li>';
          }
          ?>
        </ul>
      </div>
    </nav> -->

<div class="overflow-auto">