<fieldset class="title-container">
<legend><i class="fa fa-user"></i> <?=ucwords($user['permission']['module'])?> Details</legend>
<div class="res-container-x">
<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" id="validate-form">
 <fieldset class="fieldset-group">
     <div class="form-group">
          <label class="col-sm-3 control-label ckey">
		  <?php
              $avatar = ($result['avatar']=="") ? base_url()."media/images/no_avatar.jpg" : base_url()."uploads/avatar/".$result['avatar'];
              $avatarx = ($result['avatar']=="") ? "no_avatar.jpg" : $result['avatar'];
            ?>
				<img src="<?=$avatar?>" id="img_preview" class="img-thumbnail" style="width:100px;margin-right:10px" /></label>
				<div class="col-sm-7">
					<fieldset class="fieldset-group">
						<legend style="padding: 0;margin-bottom: 0;">Basic Information</legend>
					</fieldset>
					<h3><strong><?=ucfirst($result['firstname'])?> <?=ucfirst($result['middlename'][0])?>. <?=ucfirst($result['lastname'])?></strong></h3>
					<h4>[<?=$result['eid']?>] <?=$result['position']?> - <?=$result['department']?></h4>
					<p><strong>Hired Date</strong> : <?=date("F j, Y",strtotime($result['hire_date']))?></p>
					<p><strong>Address</strong> : <?=$result['address1']." ".$result['address2']." ".$result['address3']?></p>
					<p><strong>Mobile #</strong> : <?=$result['mobile_number']?></p>
					<fieldset class="fieldset-group">
						<legend style="padding: 0;margin-bottom: 0;">Personal Information</legend>
					</fieldset>
				</div>
        </div>
	
	 <div class="form-group _s">
        <label class="col-sm-3 control-label ckey" style="">Social Security (SSS)</label>
        <div class="col-sm-7"><?=$result['_sss']?></div>
      </div>

      <div class="form-group _s">
        <label class="col-sm-3 control-label ckey">Philhealth</label>
        <div class="col-sm-7"><?=$result['_philhealth']?>
        </div>
      </div>

       <div class="form-group _s">
        <label class="col-sm-3 control-label ckey">Pagibig</label>
        <div class="col-sm-7"><?=$result['_pagibig']?></div>
      </div>

      <div class="form-group _s">
        <label class="col-sm-3 control-label ckey">TIN</label>
        <div class="col-sm-7"><?=$result['_tin']?> </div>
      </div>
	   <div class="form-group _s">
        <label class="col-sm-3 control-label ckey">Username</label>
        <div class="col-sm-7"><?=$result['email']?> </div>
      </div>

  <br class="clear"/>
    </fieldset>

    <div class="form-actions" style="padding-left:20px">
       <button type="button" class="btn btn-primary blue"><span class="fa fa-print" style="color:#fff"></span> Print</button>
	     <a href="javascript:history.back()" class="btn btn-default">Back</a>
	   </div>

    

</form>
</div>
</fieldset>

<style type="text/css">
.form-horizontal .control-label, .form-horizontal .radio, .form-horizontal .checkbox, .form-horizontal .radio-inline, .form-horizontal .checkbox-inline{
	padding-top:0px
}
</style>

