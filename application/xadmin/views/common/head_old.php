<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crackerjack</title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/ver3.0/')?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url('assets/ver3.0/')?>css/generals.css" rel="stylesheet">
  </head>

  <body>
    <div id="wrap">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse" id="brand-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a class="navbar-brand" href="<?=base_url('xadmin')?>"><img src="<?=base_url()?>assets/ver3.0/images/eappraisal.png" alt="Performation Management eAppraisal Matrix"/> Performation Management eAppraisal Matrix Administrational panel</a>
        </div>
       
      </div>
    </div>

<!---
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="main-navigation">
      <div class="container">
       <ul class="nav navbar-nav navbar-left">
            <li  class="active"><a href="../navbar/"><img src="<?=base_url()?>assets/ver3.0/images/icons/home.png" style="margin-top: -4px;" /> Dashboard</a></li>
            <li><a href="../navbar-static-top/"><img src="<?=base_url()?>assets/ver3.0/images/icons/system.png" style="margin-top: -4px;" /> System settings</a></li>
            <li><a href="./"><img src="<?=base_url()?>assets/ver3.0/images/icons/lightbulb.png" style="margin-top: -4px;" /> About</a></li>
          </ul>
       
      </div>
    </div>

  //-->

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
                  echo '<li><a href="'.base_url().'xadmin/'.$url.'" class="'.$isactive.'"><i class="custom-icon-small-'.str_replace('/','-',$url).'"></i> '.$data['nagivation'][$k][$kx]['module'].' <span class="arrow"></span></a></li>';
                }
              }
              
            }
          }     
           ?>
            </ul>

         
        </div>

        <div class="right-panel container">