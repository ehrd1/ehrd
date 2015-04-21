    <div>
      <ul class="breadcrumb">
        <li>
          <a href="<?php echo base_url();?>">首頁</a>
          <span class="divider">/</span>
        </li>
        <li>
          <a href="<?php echo base_url("unit");?>">單位資訊列表</a>
          <span class="divider">/</span>
        </li>
        <li>編輯單位資訊</li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="box span12">
        <div class="box-header well" data-original-title>
          <h2><i class="icon-edit"></i> 編輯單位資訊</h2>
        </div>
        <div class="box-content">
          <form id="unitFrom" class="form-horizontal" method="post" action="<?php echo base_url("unit/update/".$unitData[0]['unit_id']);?>">
            <fieldset>
              <legend> 編輯單位資訊</legend>
              <div class="control-group">
                <label class="control-label" for="unitName">單位名稱</label>
								<div class="controls">
									<input name="unitName" type="text" id="unitName" class="input-xlarge span3" value="<?php echo $unitData[0]['unit_name'];?>"/>
								</div>
              </div>
              <div class="control-group">
                <label class="control-label" for="unitStatus">啟用狀態</label>
                <div class="controls">
									<label class="radio inline">
										<input type="radio" name="unitStatus" value="1" <?php echo ($unitData[0]['unit_status']==1) ? 'checked' : '';?>>啟用
									</label>
									<label class="radio inline">
										<input type="radio" name="unitStatus" value="0" <?php echo ($unitData[0]['unit_status']==0) ? 'checked' : '';?>>停用
									</label>
                </div>
              </div>
              <div class="form-actions">
                <button id="saveUnitInfo" type="submit" class="btn btn-primary">儲存變更</button>
								<input name="unitID" type="hidden" id="unitID" class="input-xlarge span3" value="<?php echo $unitData[0]['unit_id'];?>"/>
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
			$("#unitFrom").submit(function(e){
				var unitName = $('#unitName').val();
				if(unitName == ''){
					e.preventDefault();
					$("#alertMessage").empty().html("<strong>錯誤訊息</strong> : 單位名稱不能為空白!!").fadeIn();
					$("#unitName").focus();
					return false;
				}
			});
		</script>