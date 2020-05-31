<?php require_once("config/config.php"); ?>
<?php require_once("inc/header.php"); ?>

		<div class="row">
			 <div class="col-md-4 mx-auto mt-3" id="failed_div">
    <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Failed!</strong>Please Enter Correct Login Details.
</div>
  </div>
 
		</div>
		<div class="row">
			 <div class="col-md-4 mx-auto mt-3" id="blocked_div">
    <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Failed!</strong>You are blocked by admin.
</div>
  </div>
		</div>
		<div class="row">

			<div class="col-md-4 mx-auto" id="login_form">
				<h3 class="text-center text-white">Login</h3>
				<hr style="background-color: #fff;">
				<div class="form-group">
					<label>Username:</label>
					<input type="email" name="username" id="username" placeholder="Enter Username" class="form-control">
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" name="user_password" id="user_password" placeholder="Enter Password" class="form-control">
				</div>
				<button id="login" class="btn btn-primary">Login&nbsp;<i class="fa fa-angle-double-right"></i></button>
			</div>
		</div>
<?php require_once("inc/footer.php"); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#blocked_div").hide();
		$("#failed_div").hide();
		$(document).on("click","#login",function(){
			var username = $("#username").val();
			var user_password = $("#user_password").val();

			if(username == ""){
    			$("#username").css("border","3px solid red");
        		$("#username").focus();
        		//$("#email_error_msg").text("Please Enter email address");
        		//$("#email_error_msg").css("color","red");
        		setTimeout("$('#username').css('border','')",3000);
       			 return false;

    		}
    		if(user_password == ""){
    			$("#user_password").css("border","3px solid red");
        		$("#user_password").focus();
       			// $("#user_password_err").text("Please Enter Password");
        		//$("#user_password_err").css("color","red");
        		setTimeout("$('#user_password').css('border','')",3000);
        		return false;

    		}

			var data = {
				"username":username,
				"user_password":user_password

			}

			$.ajax({
				 type : 'POST',
      			url  : 'login_sub.php',
      			data : data,
      			success:function(res){
      				if(res == "Login"){
                //if profile is created it will redirect to home page
      					window.location.href = "dashboard.php";
      				}
      				if(res == "failed"){
      						$("#failed_div").show();

      				}
      				if(res == "blocked"){
      					$("#blocked_div").show();

      				}

      			}

			});

		});
	});
</script>
	