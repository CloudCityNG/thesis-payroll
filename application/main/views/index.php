<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>Thesis Payroll System</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/sticky-footer.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<div class="header">
      <div class="container">
      <div class="page-header clearfix" style="margin-top:0px;margin-bottom:0px">
        <img src="<?=base_url()?>assets/employee/images/logo.jpg" class="pull-left" />
        <h1 class="pull-left">St. Bernadatte Publishing House Corporation <br /> <small>" Quest for Excellence in Educating Young Minds"</small></h1>
      </div>
    </div>
</div>
      <div class="container">
        <div class="row cleasfix">
            <div class="col-sm-6" style="float:none;margin:0 auto;margin-top:20px">

              <!-- start -->

                        <div class="board">
                            <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                            <div class="board-inner col-sm-10">
                              <h3>Please Login</h3>
                            <ul class="nav nav-tabs" id="myTab">

                          <li>
                            <a href="#employee" data-toggle="tab" title="profile">
                             <span class="round-tabs two">
                                <span class="glyphicon glyphicon-user"></span> Employee
                             </span> 
                            </a>
                         </li>
                         
                             <li class="active">
                             <a href="#administrator" data-toggle="tab" title="welcome">
                              <span class="round-tabs one">
                                <span class="glyphicon glyphicon-cog"></span>
                                  Administration
                              </span> 
                              </a>
                            </li>
                             
                             </ul>
                           </div>

                             <div class="tab-content">
                              <div class="tab-pane fade " id="employee"></div>
                              <div class="tab-pane fade in active" id="administrator"></div>
                             
                                 <form role="form" class="login" id="login" method="post">
                                      <div class="col-sm-10 clearfix" style="padding-top:30px  ">
                                        <div id="result"></div>
                                        <div class="form-group float-label-control">
                                            <input type="email" name="username" class="form-control modified-txtbox" placeholder="Username">
                                        </div>
                                        <div class="form-group float-label-control">
                                            <input type="password" name="password" class="form-control modified-txtbox" placeholder="Password">
                                        </div>
                                       
                                        
                            <div class="remember-forgot">
                  
                        <div class="col-md-7 forgot-pass-content">
                            <a href="http://localhost/thesis-payroll/xadmin/home/forgot" class="forgot-pass" style="color: #aaaaaa;">Forgot Password</a>
                        </div>
                    </div>
					  <div class="row">
                        <div class="col-md-4">
						  </div>
						  
                        <button type="submit" name="btn_success" class="btn btn-success">Login</button>&nbsp&nbsp&nbsp
						<button type="reset" name="btn_success" class="btn btn-success">Cancel</button>
					
						  </div>
					
                       </div>
              
                </form>
                  
          </div>

         
              <!-- end -->

            </div>
            </div>

        </div>
    </div>

    <div class="footer">
      <div class="container">
	  
        <p class="text-center"> &copy; <?=date("Y")?>Web-based Payroll System. All rights reserved.</p>
      </div>
    </div>


    <style type="text/css">
        #myTab li{float: right;}
    </style>

    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function(){
              $('#login').submit(function(e){
                var active = $('#myTab li.active a').attr('href');
                    var postData = $(this).serializeArray();
                      var where = (active=='#administrator') ? 'xadmin/' : 'profile/';
                      $.ajax(
                      {
                          url : '<?=base_url()?>'+where+'home/auth',
                          type: "POST",
                          data : postData,
                          success:function(data, textStatus, jqXHR) 
                          {
                             if (data==1 ||data==0 ) {
                              $('#result').addClass('alert alert-danger').fadeIn().html("Invalid username and password");
                             }else if(data==2){
                                $('#result').removeClass('alert alert-danger').addClass('alert alert-success').fadeIn().html("logging in...");
                                window.location = '<?=base_url()?>'+where;
                             }
                          },
                          error: function(jqXHR, textStatus, errorThrown) 
                          {
                              //if fails      
                          }
                      });
                      e.preventDefault(); //STOP default action
                      return false;
              });

      
           
           $.ajax(
                      {
                          url : '<?=base_url()?>xadmin/home/ajaxlogin',
                          type: "POST",
                          data : null,
                          success:function(data, textStatus, jqXHR) 
                          {
                             if(data==1){
                                window.location = '<?=base_url()?>xadmin';
                             }
                          },
                          error: function(jqXHR, textStatus, errorThrown) 
                          {
                              //if fails      
                          }
             });

           $.ajax(
                              {
                                  url : '<?=base_url()?>profile/home/ajaxlogin',
                                  type: "POST",
                                  data : null,
                                  success:function(data, textStatus, jqXHR) 
                                  {
                                     if(data==1){
                                        window.location = '<?=base_url()?>profile';
                                     }
                                  },
                                  error: function(jqXHR, textStatus, errorThrown) 
                                  {
                                      //if fails      
                                  }
                     });

        })


      </script>
  </body>
</html>
