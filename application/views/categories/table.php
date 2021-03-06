<table class="table table-bordered table-striped dataTable">
	<thead>
		<tr>
			<td class="text-center">ลำดับ</td>
			<td class="text-center">ชื่อ</td>
			<td class="text-center">จัดการ</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($categories as $key => $value) {
			?>
			<tr>
				<td class="text-center"><?php echo $key+1; ?></td>
				<td class="text-left"><?php echo $value->category_name; ?></td>
				<td class="text-center">
					<button type="button" class="btn btn-default update-btn" category-id="<?php echo $value->category_id; ?>" data-toggle="modal" data-target="#modal-default">
						จัดการ
					</button>
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
			<form id="form-update">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title">Default Modal</h4>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger pull-left" id="delete-btn">ลบ</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>