    <div>
      <ul class="breadcrumb">
        <li>
          <a href="./">首頁</a>
          <span class="divider">/</span>
        </li>
        <li>
          <a href="./account">帳號清單列表</a>
          <span class="divider">/</span>
        </li>
        <li>新增帳號</li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="box span12">
        <div class="box-header well" data-original-title>
          <h2><i class="icon-edit"></i> 新增帳號</h2>
        </div>
        <div class="box-content">
          <form id="addUserAccountForm" class="form-horizontal" method="post" action="./account/add">
            <fieldset>
              <legend>新增帳號(<span class="icon icon-red icon-star-on"></span>為必填欄位)</legend>
							<div class="control-group">
                <label class="control-label" for="account"><span class="icon icon-red icon-star-on"></span>帳號</label>
								<div class="controls">
									<input name="account" type="text" id="account" class="input-xlarge" />
								</div>
              </div>
              <div class="control-group">
                <label class="control-label" for="userName"><span class="icon icon-red icon-star-on"></span>姓名</label>
								<div class="controls">
									<input name="userName" type="text" id="userName" class="input-xlarge" />
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="email"><span class="icon icon-red icon-star-on"></span>電子郵件</label>
								<div class="controls">
									<input name="email" type="text" id="email" class="input-xlarge" />
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="unitID"><span class="icon icon-red icon-star-on"></span>單位</label>
								<div class="controls">
									<select id="unitID" name="unitID" class="input-xlarge">
										<option value="">--請選擇單位--</option>
										<?php foreach( $unitData as $k =>$v ):?>
										<option value="<?php echo $v['unit_id'];?>"><?php echo $v['unit_name'];?></option>
										<?php endforeach;?>
									</select>
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="jobtitleID"><span class="icon icon-red icon-star-on"></span>職稱</label>
								<div class="controls">
									<select id="jobtitleID" name="jobtitleID" class="input-xlarge">
										<option value="">--請選擇職稱--</option>
										<?php foreach( $jobtitleData as $k =>$v ):?>
										<option value="<?php echo $v['jobtitle_id'];?>"><?php echo $v['jobtitle_name'];?></option>
										<?php endforeach;?>
									</select>
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="phone"><span class="icon icon-red icon-star-on"></span>電話</label>
								<div class="controls">
									<input name="phone" type="text" id="phone" class="input-xlarge" placeholder="02-12345678" />
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="mobilePhone">手機</label>
								<div class="controls">
									<input name="mobilePhone" type="text" id="mobilePhone" class="input-xlarge" />
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="fax">傳真</label>
								<div class="controls">
									<input name="fax" type="text" id="fax" class="input-xlarge" />
								</div>
              </div>
              <div class="control-group">
                <label class="control-label" for="userStatus"><span class="icon icon-red icon-star-on"></span>啟用狀態</label>
                <div class="controls">
									<label class="radio inline">
										<input type="radio" name="userStatus" value="1" checked>啟用
									</label>
									<label class="radio inline">
										<input type="radio" name="userStatus" value="0">停用
									</label>
                </div>
              </div>
              <div class="form-actions">
                <button id="saveUserAccount" type="submit" class="btn btn-primary">儲存變更</button>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <!--/span-->
    </div>
    <!--/row-->
		<script>		
		$(document).ready( function() {			
			//台灣電話 02-12345678
			$.validator.addMethod('taiwanPhone', function (value, element) {
				return this.optional(element) || /^0\d{1,2}-?(\d{6,8})$/.test(value);
			}, "Please enter a valid phone number");
			
			//有分機	
			//$.validator.addMethod('taiwanPhone_2', function (value, element) {
			//	return this.optional(element) || /^0\d{1,2}-?(\d{6,8})(#\d{1,5}){0,1}$/.test(value);
			//}, "Please enter a valid phone number");
			
			//手機
			$.validator.addMethod('mobilePhone', function (value, element) {
				return this.optional(element) || /^09\d{2}-?(\d{3})-?(\d{3})$/.test(value);
			}, "Please enter a valid phone number");
			
			$('#addUserAccountForm').validate({
				rules: {
					account: {
						required: true,
						minlength: 5,
						remote: "./AJAX/checkUserAccount"
					},
					userName: {
						required: true
					},
					email: {
						required: true,
						email: true,
						remote: "./AJAX/checkUserEmail"
					},
					unitID : { required: true},
					jobtitleID : { required: true },
					phone : { 
						required: true,
						taiwanPhone:true
					},
					mobilePhone : {
						mobilePhone : true
					},
					fax :{
						taiwanPhone:true
					}
				},
				messages: {
					account : {
						required : "帳號必須填寫",
						minlength: "帳號必須大於5位",
						remote : "此帳號已有人註冊了"
					},
					userName: {
						required: "姓名必須填寫",
					},
					email: {
						required: "E-Mail必須填寫",
						email: "E-Mail格式錯誤",
						remote: "此E-MAIL已被使用"
					},
					unitID : { required: "必須選擇單位" },
					jobtitleID : { required: "必填選擇職稱" },
					phone : { 
						required: "電話號碼必須填寫",
						taiwanPhone : "電話號碼格式錯誤 例:02-1234567 或 02-12345678"
					},					
					mobilePhone : {
						mobilePhone : "手機格式錯誤 例 :0912345678"
					},
					fax :{
						taiwanPhone: "傳真格式錯誤 例:02-1234567 或 02-12345678"
					}
				},
				highlight: function(element) {
					$(element).closest('.control-group').removeClass('success').addClass('error');
				},
				success: function(element) {
					element.addClass('valid').closest('.control-group').removeClass('error').addClass('success');
				},
				errorClass: "help-inline",
				errorElement: "span"
			});
		});
		</script>