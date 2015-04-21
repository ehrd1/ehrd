		<div>
      <ul class="breadcrumb">
        <li><a href="./"> 首頁</a><span class="divider">/</span></li>
        <li> 帳號清單列表</li>
      </ul>
    </div>
    <div class="row-fluid">
      <div class="box span12">
        <div class="box-header well" data-original-title="">
          <h2><i class="icon-edit"></i> 帳號清單列表</h2>
        </div>
        <div class="box-content">
          <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
              <tr>
                <th>姓名</th>
								<th>帳號</th>
								<th>單位</th>
								<th>職稱</th>
								<th>權限</th>
								<th>電子郵件</th>
                <th>狀態</th>
                <th>動作</th>
              </tr>
            </thead>
            <tbody>
						<?php foreach($accountListData AS $k=>$v):?>
							<tr>
                <td><?php echo $v['name'];?></td>
								<td><?php echo $v['account'];?></td>
								<td><?php echo $v['unit_name'];?></td>
								<td><?php echo $v['jobtitle_name'];?></td>
								<td></td>
								<td><?php echo $v['email'];?></td>
                <td class="center"><?php echo $status[$v['status']];?></td>
                <td class="center">
									<a class="btn btn-info" href="./account/update/<?php echo $v['id'];?>"><i class="icon-edit icon-white"></i>編輯</a> 
									<a class="btn btn-danger" id="del_btn" href="./account/del/<?php echo $v['id'];?>">
										<i class="icon-trash icon-white"></i>刪除
									</a>
								</td>
								</td>
              </tr>
						<?php	endforeach;?>
            </tbody>
          </table>
					<div class="form-actions">
						<a class="btn btn-info" href="./account/add">
							<i class="icon-edit icon-white"></i>新增帳號  
						</a>
          </div>
        </div>
      </div>
      <!--/span-->
    </div>
    <!--/row-->
			<script>
        $("a#del_btn").click(function(e) {
					e.preventDefault();
					var href = $(this).attr("href");
					bootbox.confirm("確定刪除此使用者?","取消", "確定刪除", function(result) {	
						if(result){
							location.replace(href);
						}else{
							console.log(result);
						}
						
					}); 
        });
    </script>