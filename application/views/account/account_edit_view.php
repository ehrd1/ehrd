    <div>
      <ul class="breadcrumb">
        <li>
          <a href="./">����</a>
          <span class="divider">/</span>
        </li>
        <li>
          <a href="./account">�b���M��C��</a>
          <span class="divider">/</span>
        </li>
        <li>�b����T�ק�</li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="box span12">
        <div class="box-header well" data-original-title>
          <h2><i class="icon-edit"></i> �b����T�ק�</h2>
        </div>
        <div class="box-content">
          <form id="addUserAccountForm" class="form-horizontal" method="post" action="./account/update/<?php echo $id;?>">
            <fieldset>
              <legend>�b����T�ק�(<span class="icon icon-red icon-star-on"></span>���������)</legend>
							<div class="control-group">
                <label class="control-label" for="account">�b��</label>
								<div class="controls"><?php echo $account;?></div>
              </div>
              <div class="control-group">
                <label class="control-label" for="userName"><span class="icon icon-red icon-star-on"></span>�m�W</label>
								<div class="controls">
									<input name="userName" type="text" id="userName" value="<?php echo $name;?>" class="input-xlarge" />
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="email"><span class="icon icon-red icon-star-on"></span>�q�l�l��</label>
								<div class="controls">
									<input name="email" type="text" id="email" value="<?php echo $email;?>" class="input-xlarge" />
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="unitID"><span class="icon icon-red icon-star-on"></span>���</label>
								<div class="controls">
									<select id="unitID" name="unitID" class="input-xlarge">
										<option value="">--�п�ܳ��--</option>
										<?php foreach( $unitData as $k =>$v ):?>
										<option value="<?php echo $v['unit_id'];?>" <?php echo ($v['unit_id'] == $unin_id) ? 'selected' : '' ;?>><?php echo $v['unit_name'];?></option>
										<?php endforeach;?>
									</select>
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="jobtitleID"><span class="icon icon-red icon-star-on"></span>¾��</label>
								<div class="controls">
									<select id="jobtitleID" name="jobtitleID" class="input-xlarge">
										<option value="">--�п��¾��--</option>
										<?php foreach( $jobtitleData as $k =>$v ):?>
										<option value="<?php echo $v['jobtitle_id'];?>" <?php echo ($v['jobtitle_id'] == $jobtitle_id) ? 'selected' : '' ;?>><?php echo $v['jobtitle_name'];?></option>
										<?php endforeach;?>
									</select>
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="phone"><span class="icon icon-red icon-star-on"></span>�q��</label>
								<div class="controls">
									<input name="phone" type="text" id="phone" class="input-xlarge" value="<?php echo $phone;?>" placeholder="02-12345678" />
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="mobilePhone">���</label>
								<div class="controls">
									<input name="mobilePhone" type="text" id="mobilePhone" value="<?php echo $mobile_phone;?>" class="input-xlarge" />
								</div>
              </div>
							<div class="control-group">
                <label class="control-label" for="fax">�ǯu</label>
								<div class="controls">
									<input name="fax" type="text" id="fax" value="<?php echo $fax;?>" class="input-xlarge" />
								</div>
              </div>
              <div class="control-group">
                <label class="control-label" for="userStatus"><span class="icon icon-red icon-star-on"></span>�ҥΪ��A</label>
                <div class="controls">
									<label class="radio inline">
										<input type="radio" name="userStatus" value="1" <?php echo ($status==1) ? 'checked': ;?>>�ҥ�
									</label>
									<label class="radio inline">
										<input type="radio" name="userStatus" value="0" <?php echo ($status==0) ? 'checked': ;?>>����
									</label>
                </div>
              </div>
              <div class="form-actions">
                <button id="saveUserAccount" type="submit" class="btn btn-primary">�x�s�ܧ�</button>
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
			
			//�x�W�q�� 02-12345678
			$.validator.addMethod('taiwanPhone', function (value, element) {
				return this.optional(element) || /^0\d{1,2}-?(\d{6,8})$/.test(value);
			}, "Please enter a valid phone number");
			
			//������	
			//$.validator.addMethod('taiwanPhone_2', function (value, element) {
			//	return this.optional(element) || /^0\d{1,2}-?(\d{6,8})(#\d{1,5}){0,1}$/.test(value);
			//}, "Please enter a valid phone number");
			
			//���
			$.validator.addMethod('mobilePhone', function (value, element) {
				return this.optional(element) || /^09\d{2}-?(\d{3})-?(\d{3})$/.test(value);
			}, "Please enter a valid phone number");
			
			$('#addUserAccountForm').validate({
				rules: {
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
					userName: {
						required: "�m�W������g",
					},
					email: {
						required: "E-Mail������g",
						email: "E-Mail�榡���~",
						remote: "��E-MAIL�w�Q�ϥ�"
					},
					unitID : { required: "������ܳ��" },
					jobtitleID : { required: "������¾��" },
					phone : { 
						required: "�q�ܸ��X������g",
						taiwanPhone : "�q�ܸ��X�榡���~ ��:02-1234567 �� 02-12345678"
					},					
					mobilePhone : {
						mobilePhone : "����榡���~ �� :0912345678"
					},
					fax :{
						taiwanPhone: "�ǯu�榡���~ ��:02-1234567 �� 02-12345678"
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