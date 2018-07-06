<section class="content-header">
    <h1>
        คูปองที่เกิดขึ้น
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Coupons History</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Coupon Table</h3>
                </div>
                <div class="box-body">
                    <?php $this->load->view('coupons/table'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready( function() {
        $('.dataTable').DataTable();
    });
</script>