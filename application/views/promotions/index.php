<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php $this->load->view('promotions/form'); ?>
        </div>
    </div>
</section>
<script type="text/javascript">

    $(document).ready(function() {
        $('.select2').select2();
        handleFormSubmit();
    });

    function handleFormSubmit() {
        $('#form').on('submit', function(e){
            e.preventDefault();
            let year = $('select[name=year]').val() - 543;
            let month = $('select[name=month]').val();
            let provider = $('select[name=provider]').val();
            month = (parseInt(month) < 10)? '0'+month: month;
            const dataString = provider+'/'+year+'-'+month;
            location.assign(BASE_URL+'promotions/'+dataString)
        });
    }
</script>