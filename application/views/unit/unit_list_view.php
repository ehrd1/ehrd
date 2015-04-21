		<div>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url();?>"> 首頁</a><span class="divider">/</span></li>
        <li>單位資訊列表</li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="box span12">
        <div class="box-header well" data-original-title="">
          <h2><i class="icon-edit"></i> 單位資訊列表</h2>
          <!--
					<div class="box-icon">
						<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
          </div>
					-->
        </div>
        <div class="box-content">
          <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
              <tr>
                <th>單位名稱</th>
                <th>狀態</th>
                <th>動作</th>
              </tr>
            </thead>
            <tbody>
						<?php foreach($unitListData AS $k=>$v):?>
							<tr>
                <td><?php echo $v['unit_name'];?></td>
                <td class="center"><?php echo $status[$v['unit_status']];?></td>
                <td class="center">
                <a class="btn btn-info" href="<?php echo base_url().'unit/update/'.$v['unit_id'];?>"><i class="icon-edit icon-white"></i>編輯</a> 
                <a class="btn btn-danger" href="<?php echo base_url().'unit/del/'.$v['unit_id'];?>"><i class="icon-trash icon-white"></i>刪除</a></td>
								</td>
              </tr>
						<?php	endforeach;?>
            </tbody>
          </table>
					<div class="form-actions">
						<a class="btn btn-info" href="<?php echo base_url("unit/add");?>">
							<i class="icon-edit icon-white"></i>新增單位資訊  
						</a>
          </div>
        </div>
      </div>
      <!--/span-->
    </div>
    <!--/row-->