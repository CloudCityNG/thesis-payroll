
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=base_url()?>media/js/jquery-2.1.0.min.js"></script>
    <script src="<?=base_url()?>media/js/nanoscroller/jquery.nanoscroller.js"></script>
    <title>Xadmin - <?=$title?></title>
    <!-- Bootstrap -->
    <link href="<?=base_url()?>media/css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url()?>media/css/font-awesome.css" rel="stylesheet">
    <link href="<?=base_url()?>media/css/xadmin.css" rel="stylesheet">
    <link href="<?=base_url()?>media/css/max768px.css" rel="stylesheet">

    <link href="<?=base_url()?>media/js/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <link href="<?=base_url()?>media/js/bootstrap-modal/bootstrap-modal.css" rel="stylesheet">
    <link href="<?=base_url()?>media/js/bootstrap-modal/bootstrap-modal-bs3patch.css" rel="stylesheet">
    <link href="<?=base_url()?>media/js/datatables/datatables.css" rel="stylesheet">
    <link href="<?=base_url()?>media/js/nanoscroller/nanoscroller.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?=base_url()?>media_be/js/html5shiv.js"></script>
      <script src="<?=base_url()?>media_be/js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .xconBar{
          margin-top: 0px;
          margin-right: 0px;
        }
    </style>
    <script type="text/javascript">
      $(function(){
          var h  = $(window).height();
          $('.scroll').css({'height':""+(h-90)+"px"});
           $(".nano").nanoScroller();
      })

    </script>
  </head>
  <body>
     <div class="navbar navbar-fixed-top navbar-default mynavbar" role="navigation">
      <div class="container">
         <div class="navbar-brand"></div>
        
        <div class="navbar-header navbar-left developer-toggle">
          
          <ul class="nav navbar-nav ">
            <li class="dropdown">
              <button type="button" class="dropdown-toggle navbar-toggle" data-toggle="dropdown" style="display:block">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar xconBar"></span>
                <span class="icon-bar xconBar"></span>
                <span class="icon-bar xconBar"></span>
              </button>
              <div class="dropdown-menu" style="overflow:hidden;width:250px;padding-top:0px">
               
              </div>
            </li>
          </ul>
          
        </div>
       <ul class="nav navbar-nav navbar-right account-settings-toogle">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$user['email']?> <i class="fa fa-user"></i> <b class="caret"></b></a>
              

             <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown">
                        <li><a href="<?=base_url('xadmin/account')?>">&nbsp;<i class="fa fa-info"></i>&nbsp; My Account Information</a></li>
                        <li><a href="<?=base_url('xadmin/account/settings')?>"><i class="fa fa-gear"></i> Account Settings</a></li>
               
                        <li class="divider"></li>
                        <li><a href="<?=base_url('xadmin/home/logout')?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                      </ul>
            </li>
          </ul>

      </div>
    </div>

    <div class="left-side pull-left">
             <div class="navbar-brand"><a  href="<?=base_url('xadmin')?>" style="padding-top:10px">SBPC Payroll System</a></div>
             <br /><br /><br /><br />
        <div class="scroll nano">
               <div class="overthrow nano-content description">
                <ul class="nav nav-list">
                <?php
                  //print_pre($user['navigation']);

                    foreach ($user['navigation'] as $show) {
                        if(count($show)>=2){
                          echo '<li class="nav-header">'.$show['label'].'</li>';
                            unset($show['label']);
                            foreach ($show as $display) {
                              $x = explode('/', $display['_url']);
                              $active = (getController()==$x[0]) ? 'active' : null;
                              echo '<li class="'.$active.'"><a href="'.base_url('xadmin/'.$display['_url']).'"><i class="icox-sm icox-sm-'.$display['_url'].'"></i> <span>'.$display['module'].'</span></a></li>';
                            }
                        }

                    }
                ?>
              </ul>
           </div>
        </div>
   </div>
    <div class="main container">
    
