	<div class="row-fluid">
		<div class="span12 center login-header">
			<h1>人才培育白皮書績效管理系統</h1>
		</div><!--/span-->		
	</div><!--/row-->
	<div class="row-fluid">
		<div class="well span5 center login-box">
			<div class="alert alert-info" id="alertMessage">請輸入帳號密碼</div>
				<form class="form-horizontal" id="formLogin" action="./login" method="post">
					<fieldset>
						<div class="input-prepend" title="使用者帳號" data-rel="tooltip">
							<span class="add-on">
								<i class="icon-user"></i>
							</span>
							<input autofocus class="input-large span10" name="userAccount" id="userAccount" type="text" placeholder="使用者帳號"/>
						</div>
						<div class="clearfix"></div>
						<div class="input-prepend" title="密碼" data-rel="tooltip">
							<span class="add-on">
								<i class="icon-lock"></i>
							</span>
							<input class="input-large span10" name="password" id="password" type="password" placeholder="密碼"/>						
						</div>					
						<!--
						<div class="clearfix"></div>
						<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
						</div>-->
						<div class="clearfix"></div>
						<p class="center span5">
							<button type="submit" id="userLogin" class="btn btn-primary">登入</button>
						</p>
					</fieldset>
				</form>
			</div><!--/span-->
		</div><!--/row-->
		<script>
			$("#formLogin").submit(function(e){
				var userAccount = $("#userAccount").val();
				var password = $("#password").val();
				var checkUser = false;
				$.ajax({
					url : "./AJAX/checkUserAccountPW",
					type : "POST",
					dataType : "text",
					async: false,
					data : {
						userAccount : userAccount,
						password : password
					},	
					success : function(Message){
						if(Message =='checkFALSE'){
							checkUser = true;							
						}
					},
					error : function(){
						console.log("Error");
					}
				});
				
				if( userAccount == '' ){
					e.preventDefault();
					$("#alertMessage").removeClass("alert-info").addClass("alert-error").empty().html("<strong>錯誤訊息</strong> : 使用者帳號不能為空白!!");
					$("#userAccount").focus();
					return false;
				} else if( password == '' ) {
					e.preventDefault();
					$("#alertMessage").removeClass("alert-info").addClass("alert-error").empty().html("<strong>錯誤訊息</strong> : 密碼不能為空白!!");
					$("#password").focus();
					return false;
				} else if( checkUser ){
					e.preventDefault();
					$("#alertMessage").removeClass("alert-info").addClass("alert-error").empty().html("<strong>錯誤訊息</strong> : 請確認帳號密碼是否輸入錯誤!!");
					$("#userAccount").focus();
					return false;
				}		
			});		
		</script>