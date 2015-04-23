<div>
  <ul class="breadcrumb">
    <li><a href="<?php echo base_url();?>"> 首頁</a><span class="divider">/</span></li>
    <li>年度計劃開放設定</li>
  </ul>
</div>
<?php
  $month = array(
    1=>'一月份',2=>'二月份',3=>'三月份',4=>'四月份',5=>'五月份',6=>'六月份',7=>'七月份',8=>'八月份',9=>'九月份',10=>'十月份',11=>'十一月份',12=>'十二月份'
  );
?>
<div class="row-fluid">
  <div class="box span12">
    <div class="box-header well" data-original-title="">
      <h2><i class="icon-edit"></i> 年度計劃開放設定</h2>
    </div>
    <div class="box-content">
      <form id="jobTitleFrom" class="form-horizontal" method="post" action="<?php echo base_url("dateRange/planSetDateRangeSet/update");?>">
        <fieldset>
          <legend>年度計劃開放設定</legend>
          <div class="control-group">
            <label class="control-label" for="start_time">時間開放區間</label>
            <div class="controls">
              <div class="input-prepend">
                <span class="add-on">每年度</span>
                <select id="open_time" name="open_time" class="input-small" style="background-color: cornsilk;">
                  <option value="">--請選擇--</option>
                  <?php
                    foreach( $month as $k=>$v):
                  ?>
                  <option value="<?php echo $k;?>" <?php echo ($k==$option_01) ? 'selected': '' ;?>><?php echo $v; ?></option>
                  <?php
                    endforeach;
                  ?>
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