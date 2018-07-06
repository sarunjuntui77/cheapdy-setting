<table class="table table-bordered table-striped dataTable">
  <thead>
    <tr>
      <td class="text-center">ลำดับ</td>
      <td class="text-center">Title</td>
      <td class="text-center">เนื้อหา</td>
      <td class="text-center">รูปหลัก</td>
      <td class="text-center">หมวด</td>
      <td class="text-center">จัดการ</td>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($providers as $key => $value) {
      ?>
      <tr>
        <td class="text-center"><?php echo $key+1 ; ?></td>
        <td class="text-left"><?php echo $value->provider_title ; ?></td>
        <td class="text-left"><?php echo $value->provider_content ; ?></td>
        <td class="text-center">
          <img style="width: 100px;" src="<?php echo $value->provider_image_url ; ?>">
        </td>
        <td class="text-left"><?php echo $value->category_name ; ?></td>
        <td class="text-center">
          <button type="button" class="btn btn-default edit-btn" data-toggle="modal" data-target="#modal-default" member-id="<?php echo $value->provider_id ; ?>">จัดการ</i></button>
        </td>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" id="form-update">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title">Edit Provider</h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left delete-btn">ลบ</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
