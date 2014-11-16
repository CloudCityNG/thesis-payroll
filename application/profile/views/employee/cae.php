<fieldset class="title-container">
<legend><i class="custom-icon-<?=$data['permission']['url']?> pull-left"></i> Calendar and Events <br> <small>Create and modify events </small></legend>
<div style="clear:both"></div>
<?php
echo (isset($success) ? $success :null);
?>
<div id="calendar"></div>
</fieldset>
