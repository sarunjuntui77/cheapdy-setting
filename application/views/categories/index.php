<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Members Table</h3>
                </div>
                <div class="box-body">
                    <?php $this->load->view('categories/table'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php $this->load->view('categories/form'); ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    let table;
    $(document).ready( function() {
        table = $('.dataTable').DataTable();
        handleFormSubmit();
        handleUpdateBtn();
        handleFormUpdateSubmit();
        handleDelete();
    });

    function handleFormSubmit() {
        $('#form').on('submit', function(e){
            e.preventDefault();
            const body = $(this).serialize();
            $.ajax({
                url: BASE_URL+'admin/api/category/add',
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

    function handleUpdateBtn() {
        $('.update-btn').on('click', function() {
            const body = {
                id: $(this).attr('category-id')
            };
            $.ajax({
                url: BASE_URL+'admin/api/category/edit',
                type: 'GET',
                data: body,
                success: function(data){
                    $('#modal-default .modal-body').html(data);
                }
            });
        });
    }

    function handleFormUpdateSubmit() {
        $('#form-update').on('submit', function(e){
            e.preventDefault();
            const body = $(this).serialize();
            $.ajax({
                url: BASE_URL+'admin/api/category/update',
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
        $('#delete-btn').on('click', function(e){
            const body = {
                id: $('#form-update input[name=category_id]').val()
            };
            $.ajax({
                url: BASE_URL+'admin/api/category/delete',
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

    function successUpdateSubmit(data) {

    }
</script>