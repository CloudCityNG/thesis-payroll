<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="http://localhost/matrix/assets/ver3.0/images/ico.png" />
    <title>Performance Management eAppraisal Matrix</title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/ver3.0/')?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url('assets/ver3.0/')?>css/bootstrap-modal.css" rel="stylesheet">
    <link href="<?=base_url('assets/ver3.0/')?>css/bootstrap-modal-bs3patch.css" rel="stylesheet">
    <link href="<?=base_url('assets/ver3.0/')?>css/generals.css" rel="stylesheet">
    <link href="<?=base_url('assets/ver3.0/')?>css/bootstrap-select.min.css" rel="stylesheet">
    
    <script type="text/javascript" src="<?=base_url('assets/ver3.0/js/')?>jquery.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/ver3.0/js/')?>bootstrap.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/ver3.0/js/')?>bootstrap-select.min.js"></script>
    <script type="text/javascript">
      // this is important for IEs
      var polyfilter_scriptpath = '/assets/modal/';
      $(function(){
            $('.selectpicker').selectpicker();
            $('.navhover').tooltip();
      });
    </script>
  </head>

  <body style="">
 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
         
          
          <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
              <button type="button" class="dropdown-toggle navbar-toggle" data-toggle="dropdown" style="display:block">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="dropdown-menu" style="overflow:hidden;width:250px;padding-top:0px">
                <img src="<?=base_url('assets/ver3.0/images/')?>brand-logo-w-name.png">
                <h5>&nbsp;Who we are :</h5>

                 <div class="row-x">
                <img src="<?=base_url('assets/ver3.0/images/')?>circle-thumbnail.png" class="pull-left" />
                <div class="pull-left">
                  <h5><strong>Alita Borbon</strong><br /><small>Developer</small></h5>
                </div>
                <br class="clr"/>
                </div>
                 <div class="row-x">
                <img src="<?=base_url('assets/ver3.0/images/')?>circle-thumbnail.png" class="pull-left" />
                <div class="pull-left">
                  <h5><strong>Alerta</strong><br /><small>Developer</small></h5>
                </div>
                <br class="clr"/>
                </div>
                <div class="row-x">
                <img src="<?=base_url('assets/employee/images/')?>jhob.png" class="pull-left" />
                <div class="pull-left">
                  <h5><strong>Jhobert Abayan</strong><br /><small>Developer</small></h5>
                </div>
                <br class="clr"/>
                </div>
                 <div class="row-x">
                <img src="<?=base_url('assets/employee/images/')?>rj.png" class="pull-left" />
                <div class="pull-left">
                  <h5><strong>Arjay Tablate</strong><br /><small>Developer</small></h5>
                </div>
                <br class="clr"/>
                </div>
                
                 <div class="row-x">
                  <img src="<?=base_url('assets/employee/images/')?>red.png" class="pull-left" />
                  <div class="pull-left">
                    <h5><strong>Red Mariano De Juan</strong><br /><small>Developer</small><br /><small>http://github.com/marikudo/</small></h5>
                  </div>
                  <br class="clr"/>
                </div>
              </div>
            </li>
          </ul>
          <a class="navbar-brand" href="<?=base_url('xadmin')?>" style="padding-top:10px"><img src="<?=base_url()?>assets/ver3.0/images/eappraisal.png" alt="Performation Management eAppraisal Matrix" style="width: 50px;margin-top: -1px;"/> Performance Management eAppraisal Matrix</a>
        </div>
       <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Logged as <?=$info['email']?> <b class="caret"></b></a>
             <ul class="dropdown-menu" role="menu" aria-labelledby="user-dropdown">
                        <li><a href="<?=base_url('xadmin/account/information/modify')?>"><i class="icon-info-sign"></i> My Account Information</a></li>
                        <li><a href="<?=base_url('xadmin/account/settings')?>"><i class="icon-cog"></i> Account Settings</a></li>
               
                        <li class="divider"></li>
                        <li><a href="<?=base_url('xadmin/main/logout')?>"><i class="icon-off"></i> Logout</a></li>
                      </ul>
            </li>
          </ul>

      </div>
    </div>


    <div id="wrap">
     <!-- <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="main-navigation">
            <div class="container">
             <ul class="nav navbar-nav navbar-left">
                  <li  class="active"><a href="../navbar/"><img src="<?=base_url()?>assets/ver3.0/images/icons/home.png" style="margin-top: -4px;" /> Dashboard</a></li>
                  <li><a href="../navbar-static-top/"><img src="<?=base_url()?>assets/ver3.0/images/icons/system.png" style="margin-top: -4px;" /> CMS</a></li>
                  <li><a href="./"><img src="<?=base_url()?>assets/ver3.0/images/icons/lightbulb.png" style="margin-top: -4px;" /> About</a></li>
                </ul>
             
            </div>
          </div>-->

     <div class="container">
        <div class="left-panel">
           <ul class="nav nav-list left-nav" id="left-menu-panel">
     <?php
           $x = explode('/','main');
              $method = str_replace('-','_', $x[1]);
              $isactivex = (_controller()== $x[0] || _method()==$method)? 'menu-active' : null;
              $icon_activex = (_controller()== $x[0] || _method()==$method)? '' : null;
          
          if(!isset($data['nagivation'][1])){
              echo "<li class='nav-header'>Home</li>";
              ?>
               <li><a href="<?=base_url('xadmin/#home')?>" class="<?=$isactivex?>"><i class="custom-icon-small-home"></i> Dashboard <span class="arrow"></span></a></li>
                  
              <?php
          }
        
    
     ?>
     <?php
          if(count($data['nagivation']) != 0){
            foreach($data['nagivation'] as $k => $v){
              $xxy = $k;
              foreach($v as $kx => $vx){
                if(!is_array($vx)){
                  
                  echo "<li class='nav-header'>".$vx."</li>";
                }else{
                  
                  $url = $data['nagivation'][$k][$kx]['url'];
                  $x = explode('/',$url);
                  $method = str_replace('-','_', $x[1]);
                  $isactive = (_controller()== $x[0] || _method()==$method)? 'menu-active' : null;
                  $icon = (_controller()== $x[0] || _method()==$method)? '' : 'icon-white';
                  if($k==1){
                  ?>
                    <li><a href="<?=base_url('xadmin/#home')?>" class="<?=$isactivex?>"><i class="custom-icon-small-home"></i> Dashboard <span class="arrow"></span></a></li>
                  <?php
                  }
                  $title = (strlen($data['nagivation'][$k][$kx]['module'])>=21) ? $data['nagivation'][$k][$kx]['module'] : null;
                  $hover = (strlen($data['nagivation'][$k][$kx]['module'])>=21) ? 'navhover' : null;
                  echo '<li><a href="'.base_url().'xadmin/'.$url.'" data-placement="right" data-original-title="'.$title.'" class="'.$isactive.' '.$hover.'"><i class="custom-icon-small-'.str_replace('/','-',$url).'"></i> '.readmore(ucwords($data['nagivation'][$k][$kx]['module']),21,'').' <span class="arrow"></span></a></li>';
                }
              }
              
            }
          }     
           ?>
            </ul>

         
        </div>

        <div class="right-panel container">