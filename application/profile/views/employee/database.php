<fieldset class="title-container">
<legend><i class="custom-icon-<?=$data['permission']['url']?> pull-left"></i> Database <br> <small>Backup your database regularly </small></legend>
<div style="clear:both"></div>
<?php
echo (isset($success) ? $success :null);
?>

<form action="<?=base_url('xadmin/database')?>" method="POST">
	<div class="row" style="padding-top:50px">
		<div class="col-md-9">
			<img src="<?=base_url()?>assets/ver3.0/images/download_database.png" class="pull-left">
			<p class="pull-left col-md-7">Have not taken the database backkup yet?<br />
			Click on the button to back up your database.<br />
			This proces may takes long time depending on the database size.<br /><br />
			<input type="submit" value="Backup Database" name="submit-btn" class="btn btn-success" />
			</p>
		<br class="clr" />
		</div>
		<br class="clr" />
	</div>

</form>

</fieldset>

    
