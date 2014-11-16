<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>assets/employee/images/logo.jpg" />
    <title>St. Bernadatte Publishing House Corporation Payroll System</title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/employee/')?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url('assets/employee/')?>css/bootstrap-modal.css" rel="stylesheet">
    <link href="<?=base_url('assets/employee/')?>css/bootstrap-modal-bs3patch.css" rel="stylesheet">
    <link href="<?=base_url('assets/employee/')?>css/generals.css" rel="stylesheet">
    <link href="<?=base_url('assets/employee/')?>css/bootstrap-select.min.css" rel="stylesheet">
    
    <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>jquery.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>bootstrap.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>bootstrap-select.min.js"></script>
    <script type="text/javascript">
      // this is important for IEs
      var polyfilter_scriptpath = '/assets/modal/';
      $(function(){
            $('.selectpicker').selectpicker();
      });
    </script>
  </head>

  <body>
 <div class="navbar navbar-default navbar-head" role="navigation">
      <div class="container">
        <div class="navbar-header">        
          <a class="navbar-brand" href="<?=base_url('account')?>" style="padding-top:10px;text-transform:uppercase">St. Bernadatte Publishing House Corporation Payroll System</a>
        </div>
       <ul class="nav navbar-nav navbar-right">
            <li><a href="#" style="padding-right:0px">Logged as <?=$info['email']?></a></li>
            <li><a href="<?=base_url('profile/home/logout')?>">Logout</a></li>
          </ul>

      </div>
    </div>


    <div id="wrap">

     <div class="container">
          <div class="user-login-name">
            <h3><span id="user-fullname"><?=ucfirst($info['firstname'])." ".ucfirst($info['lastname'])?></span> <small>- <?=$info['department']?> <i>(<?=$info['position']?>)</i></small></h3>
          </div>


       <div class="pull-left left-panel">
        <ul class="nav nav-list menu">
             <!--  <li class="nav-header">Home</li> -->
                <li><a href="<?=base_url('profile/home')?>"><span class="glyphicon glyphicon-home pull-left" style="margin-right: 5px;"></span> Dashboard</a></li>
                <li><a href="<?=base_url()?>profile/my-request"><span class="glyphicon glyphicon-star pull-left" style="margin-right: 5px;"></span> My Request </a>
                <li><a href="#"><span class="glyphicon glyphicon-th-list pull-left" style="margin-right: 5px;"></span> Daily Attendance </a>
                <li><a href="#"><span class="glyphicon glyphicon-file pull-left" style="margin-right: 5px;"></span> Payslip </a>
                <li class="dropdown" style="width:auto">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog pull-left" style="margin-right: 5px;"></span> My Account <span class="caret pull-right" style="margin-top:7px"></span></a>
                <ul class="dropdown-menu" role="menu" style="width: 200px;">
                    <li><a href="<?=base_url()?>profile/account/information">Account Information</a></li>
                    <li><a href="<?=base_url()?>profile/account/settings">Account Settings</a></li>
                    
                  </ul>
              </li>

               <li><a href="#"></a>
                  

                </li>
                <li class="divider"></li>
              </ul>
              <div style="text-align:right">
              <h4>Quick Help</h4>
              <p>Edit your basic account information</p>
              </div>
       </div>
       


      
        <div class="right-panel pull-left">

          
