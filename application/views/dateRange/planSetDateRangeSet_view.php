		<div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url();?>"> 首頁</a><span class="divider">/</span></li>
        <li>年度計劃開放設定</li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="box span12">
        <div class="box-header well" data-original-title="">
          <h2><i class="icon-edit"></i> 年度計劃開放設定</h2>
        </div>
        <div class="box-content">
          <form id="jobTitleFrom" class="form-horizontal" method="post" action="<?php echo base_url("dateRange/modify");?>">
            <fieldset>
              <legend>年度計劃開放設定</legend>
              <div class="control-group">
                <label class="control-label" for="start_time">時間開放區間</label>
								<div class="controls">
									<div class="input-prepend">
                    <span class="add-on">每年度</span>
                    <select id="start_time" name="start_time" class="input-small" style="background-color: cornsilk;">
                      <option value="1">一月份</option>
                      <option value="2">二月份</option>
                      <option value="3">三月份</option>
                      <option value="4">四月份</option>
                      <option value="5">五月份</option>
                      <option value="6">六月份</option>
                      <option value="7">七月份</option>
                      <option value="8">八月份</option>
                      <option value="9">九月份</option>
                      <option value="10">十月份</option>
                      <option value="11">十一月份</option>
                      <option value="12">十二月份</option>
                    </select>
                    <span class="add-on">開始年度計劃設定</span>
								</div>
              </div>
              <div class="form-actions">
                <button id="saveDateRange" type="submit" class="btn btn-primary">儲存</button>
              </div>
            </fieldset>
          </form>
        </div>
        <!--/span-->
      </div>
      <!--/row-->
    </div>