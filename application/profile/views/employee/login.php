<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?=base_url()?>assets/employee/images/sitel.jpg" />
    <title>Performance Management eAppraisal Matrix</title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/employee/')?>css/bootstrap.css" rel="stylesheet">
    <link href="<?=base_url('assets/employee/')?>css/bootstrap-modal.css" rel="stylesheet">
    <link href="<?=base_url('assets/employee/')?>css/bootstrap-modal-bs3patch.css" rel="stylesheet">
    <link href="<?=base_url('assets/employee/')?>css/generals.css" rel="stylesheet">
    <link href="<?=base_url('assets/employee/')?>css/bootstrap-select.min.css" rel="stylesheet">
    
    <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>jquery.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>bootstrap.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>bootstrap-select.min.js"></script>
    
    <style type="text/css">
    /* Sticky footer styles
      -------------------------------------------------- */
      html {
        position: relative;
        min-height: 100%;
      }
      body {
        /* Margin bottom by footer height */
      /*  margin-bottom: 60px;*/
      }
      .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 60px;
        background-color: #fff;
      }


      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      .container {
        width: auto;
        max-width: 960px;
        padding: 0 15px;
      }
      .container .text-muted {
        margin: 20px 0;
      }

      .panel-default > .panel-heading {
      color: #fff;
      background-color: #c7002b;
      border-color: #c7002b;
      }
</style>

  </head>

  <body>

<div class="container">
  <center>
    <br />
  <img src="<?=base_url()?>assets/employee/images/sitel.jpg" style="width:200px;"/>
  <h1>Welcome to Sitel Payroll System</h1>
  </center>
  <br />
    <div class="col-md-6" style="margin:0 auto;float:none">
      <div class="panel panel-default">
      <div class="panel-heading"><h3 class="panel-title"><strong>Employee Login </strong></h3></div>
      <div class="panel-body">
        <div id="loginResult"></div>
       <form role="form" action="<?=base_url()?>profile/home/auth" method="post" id="login">
      <div class="form-group">
        <label for="exampleInputEmail1">Username or Email</label>
        <input type="email" name="username" class="form-control" style="border-radius:0px;width:100%" id="exampleInputEmail1" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password <a href="/sessions/forgot_password">(forgot password)</a></label>
        <input type="password" name="password" class="form-control" style="border-radius:0px;width:100%" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-sm btn-default">Sign in</button>
    </form>
      </div>
    </div>
    </div>

</div>

<div class="footer">
  <div class="container">
  </div>
</div>
<script type="text/javascript">
  $(function(){
      $('#login').on('submit',function(e){
          e.preventDefault(); //STOP default action
        var postData = $(this).serializeArray();
          var formURL = $(this).attr("action");
          $.ajax(
          {
              url : formURL,
              type: "POST",
              data : postData,
              success:function(data, textStatus, jqXHR) 
              {
                  //data: return data from server

                  if (data==1 || data==0) {
                    $('#loginResult').fadeOut('slow').fadeIn('slow').html('Invalid Username/password').css({'color':'red'});
                  }else{
                     $('#loginResult').fadeOut('slow').fadeIn('slow').html('Processing...').css({'color':'green'});
                      window.location = '<?=base_url()?>profile/home';
                  }
              },
              error: function(jqXHR, textStatus, errorThrown) 
              {
                  //if fails      
              }
          });
          e.unbind(); //unbind. to stop multiple form submit.
          alert(1);
      });

  })
</script>
       <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>bootstrap-modalmanager.js"></script>
       <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>bootstrap-modal.js"></script>
       <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>jquery-ui.custom.min.js"></script>
       <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>jquery.alphanumeric.js"></script>
       <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>jquery.form.js"></script>
       <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>jquery.maskedinput.min.js"></script>
       <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>jquery.validate.js"></script>
       <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>jquery.mymethods.js"></script>
       <script type="text/javascript" src="<?=base_url('assets/employee/js/')?>tooltip.js"></script>
    </body>
</html>
