<table class="table table-bordered table-striped dataTable" style="width: 1920px;">
    <thead>
        <tr>
            <td class="text-center">#</td>
            <td class="text-center">Date</td>
            <td class="text-center">Name</td>
            <td class="text-center">Email</td>
            <td class="text-center">Sex</td>
            <td class="text-center">Code</td>
            <td class="text-center">Promotion</td>
            <td class="text-center">Provider</td>
            <td class="text-center">Ip</td>
            <td class="text-center">Device</td>
            <td class="text-center">Scan By</td>
            <td class="text-center">Scan Date</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($coupons as $key => $coupon) {
            ?>
            <tr>
                <td class="text-center"><?=$key+1?></td>
                <td class="text-center">
                    <?=$this->date_ui->get_thai_format($coupon->coupon_datetime)?>
                    <?=$this->date_ui->time_only($coupon->coupon_datetime)?>
                </td>
                <td><?=$coupon->coupon_name?></td>
                <td><?=$coupon->coupon_email?></td>
                <td class="text-center"><?=$coupon->coupon_sex?></td>
                <td class="text-center"><?=$coupon->coupon_code?></td>
                <td><?=$coupon->promotion_title?></td>
                <td><?=$coupon->provider_name?></td>
                <td><?=$coupon->coupon_ip?></td>
                <td><?=$coupon->coupon_getby?></td>
                <td><?=$coupon->member_name?></td>
                <td>
                    <?php
                        if ($coupon->coupon_scan_time != '' || isset($coupon->coupon_scan_time)) {
                            echo $this->date_ui->get_thai_format($coupon->coupon_scan_time);
                            echo " ";
                            echo $this->date_ui->time_only($coupon->coupon_scan_time);
                        }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<style type="text/css">
.dataTables_wrapper {
    overflow-x: scroll;
}
</style>