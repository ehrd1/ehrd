    <div>
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo base_url();?>">首頁</a>
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo base_url("jobtitle");?>">職稱列表</a>
          <span class="divider">/</span>
        </li>
        <li>職稱</li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="box span12">
        <div class="box-header well" data-original-title>
          <h2><i class="icon-edit"></i> 新增職稱</h2>
        </div>
        <div class="box-content">
          <form id="jobTitleFrom" class="form-horizontal" method="post" action="<?php echo base_url("jobtitle/add");?>">
            <fieldset>
              <legend>新增職稱</legend>
              <div class="control-group">
                <label class="control-label" for="jobtitleName">職稱</label>
								<div class="controls">
									<input name="jobtitleName" type="text" id="jobtitleName" class="input-xlarge span3" />
								</div>
              </div>
              <div class="control-group">
                <label class="control-label" for="jobtitleStatus">啟用狀態</label>
                <div class="controls">
									<label class="radio inline">
										<input type="radio" name="jobtitleStatus" value="1" checked>啟用
									</label>
									<label class="radio inline">
										<input type="radio" name="jobtitleStatus" value="0">停用
									</label>
                </div>
              </div>
              <div class="form-actions">
                <button id="saveJobTitleInfo" type="submit" class="btn btn-primary">儲存變更</button>
              </div>
            </fieldset>
          </form>
					<div class="alert alert-error" id="alertMessage" style="display:none"></div>
        </div>
      </div>
      <!--/span-->
    </div>
    <!--/row-->
		<script>
			$("#jobTitleFrom").submit(function(e){
				var jobtitleName = $('#jobtitleName').val();
				var foundJobTitleName = false;
				$.ajax({						
					url : "<?php echo base_url("AJAX/checkJobTitleName");?>",
					type : "POST",
					dataType : "text",
					async: false,
					data : { jobtitleName : jobtitleName },	
					success : function(Message){
						if(Message =='FALSE'){
							foundJobTitleName = true;
						}
					},
					error : function(){
						console.log("Error");
					}
				});
				
				if(jobtitleName == ''){
					e.preventDefault();
					$("#alertMessage").empty().html("<strong>錯誤訊息</strong> : 職稱不能為空白!!").fadeIn();
					$("#jobtitleName").focus();
					return false;
				}else if( foundJobTitleName ){
					e.preventDefault();
					$("#alertMessage").empty().html("<strong>錯誤訊息</strong> : 職稱重複了!!").fadeIn();
					$("#jobtitleName").focus();
					return false;
				}	
			});
		</script>