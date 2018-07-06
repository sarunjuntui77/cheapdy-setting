<section class="content-header">
    <h1>
        หน้ารายการสมาชิก
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Members</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Members Table</h3>
                </div>
                <div class="box-body">
                    <?php $this->load->view('members/table'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Member Form</h3>
                </div>
                <div class="box-body">
                    <?php $this->load->view('members/form-add'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Edit Member</h4>
            </div>
            <form role="form" id="form-update">
                <div class="modal-body">
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let table;
    $(document).ready( function() {
        table = $('.dataTable').DataTable();
        $('.select2').select2();
        handleFormSubmit();
        handleClickDelete();
        handleClickUpdate();
    });

    function handleFormSubmit() {
        $('#form-add').on('submit', function(e){
            e.preventDefault();
            let provider = $('select[name=provider]').val();
            const data = {
                member_name: $('input[name=member_name]').val(),
                member_username: $('input[name=member_username]').val(),
                member_password: $('input[name=member_password]').val(),
                provider_id: provider.split(',')[0],
                provider_title: provider.split(',')[1],
            };
            $.ajax({
                url: BASE_URL+'admin/api/member/add',
                type: 'POST',
                data: data,
                success: function(data){
                    successFormSubmit(data);
                }
            });
        });
    }

    function handleClickDelete() {
        $('.delete').on('click', function(e){
            const row = $(this).attr('tr');
            const data = {
                member_number:  $(this).attr('id')
            }
            if(confirm('Confirm ?')) {
                $.ajax({
                    url: BASE_URL+'admin/api/member/delete',
                    type: 'POST',
                    data: data,
                    success: function(data){
                        successClickDelete(row);
                    }
                });
            }
        });
    }

    function handleClickUpdate() {
        $('.update').on('click', function(e){
            const data = {
                member_number: $(this).attr('id')
            }
            $.ajax({
                url: BASE_URL+'admin/api/member/form',
                type: 'POST',
                data: data,
                success: function(data){
                    successClickUpdate(data);
                }
            });
        });
    }

    function handleUpdateSubmit() {
        $('#form-update').on('submit', function(e){
            e.preventDefault();
            let provider = $('#form-update select[name=provider]').val();
            const data = {
                member_number: $('#form-update input[name=member_number]').val(),
                member_name: $('#form-update input[name=member_name]').val(),
                provider_id: provider.split(',')[0],
                provider_title: provider.split(',')[1],
            };
            $.ajax({
                url: BASE_URL+'admin/api/member/update',
                type: 'POST',
                data: data,
                success: function(data){
                    successUpdateSubmit(data);
                }
            });
        });
    }

    function successFormSubmit(data) {
        if (data == 'SUCCESS') {
            location.reload();
        }
    }

    function successClickDelete(row) {
        table
        .row($(row))
        .remove()
        .draw();
    }

    function successClickUpdate(data) {
        $('.modal-body').html(data);
    }

    function successUpdateSubmit(data) {
        if (data == 'SUCCESS') {
            // location.reload();
        }
    }
</script>