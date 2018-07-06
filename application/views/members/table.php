<table class="table table-bordered table-striped dataTable">
	<thead>
		<tr>
			<td class="text-center">ลำดับ</td>
			<td class="text-center">Username</td>
			<td class="text-center">ชื่อ</td>
			<td class="text-center">Email</td>
			<td class="text-center">ร้าน</td>
			<td class="text-center">Action</td>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($members as $key => $member) {
			?>
			<tr id="tr-<?=$key+1?>">
				<td class="text-center"><?=$key+1?></td>
				<td><?=$member->member_username?></td>
				<td><?=$member->member_name?></td>
				<td><?=$member->member_email?></td>
				<td><?=$member->provider_title?></td>
				<td class="text-center">
					<button type="button" class="btn btn-info update" data-toggle="modal" data-target="#modal-default" tr="#tr-<?=$key+1?>" id="<?=$member->member_number?>"><i class="fa fa-gear"></i></button>
					<button type="button" class="btn btn-danger delete" tr="#tr-<?=$key+1?>" id="<?=$member->member_number?>"><i class="fa fa-trash"></i></button>
				</td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
