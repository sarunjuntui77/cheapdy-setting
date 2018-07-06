<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Members Table</h3>
                </div>
                <div class="box-body">
                    <?php $this->load->view('providers/table'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php $this->load->view('providers/form'); ?>
        </div>
    </div>
</section>
<script type="text/javascript">

    $(document).ready(function() {
        $('.dataTable').dataTable();
        $('.textarea').wysihtml5();
        $('.select2').select2();
        handleEditBtn();
        handleFormUpdateSubmit();
        handleAddGallery();
        handleFormSubmit();
        handleDelete();
    });

    function handleEditBtn() {
        $('.edit-btn').on('click', function(e) {
            const body = {
                id: $(this).attr('member-id')
            };
            $.ajax({
                url: 'admin/api/provider/edit',
                type: 'GET',
                data: body,
                success: function(data){
                    $('#form-update .modal-body').html(data);
                }
            });
        });
    }

    function handleAddGallery() {
        $('#add-gallery').on('click', function(e) {
            const inputElement = '<input type="text" class="form-control" name="provider_gallery[]">';
            $('gallery').append(inputElement);

        });
    }

    function handleFormSubmit() {
        $('#form').on('submit', function(e){
            e.preventDefault();
            const body = $(this).serialize();
            $.ajax({
                url: BASE_URL+'admin/api/provider/add',
                type: 'POST',
                data: body,
                success: function(data){
                    if (data == '1') {
                        location.reload();
                    }
                }
            });
        });
    }

    function handleDelete() {
        $('.delete-btn').on('click', function(e){
            const body = {
                id: $('#form-update input[name=provider_id]').val()
            };
            $.ajax({
                url: BASE_URL+'admin/api/provider/delete',
                type: 'POST',
                data: body,
                success: function(data){
                    if (data == '1') {
                        location.reload();
                    }
                }
            });
        });
    }
    function handleFormUpdateSubmit() {
        $('#form-update').on('submit', function(e){
            e.preventDefault();
            const body = $(this).serialize();
            $.ajax({
                url: BASE_URL+'admin/api/provider/update',
                type: 'POST',
                data: body,
                success: function(data){
                    if (data == '1') {
                        location.reload();
                    }
                }
            });
        });
    }

</script>