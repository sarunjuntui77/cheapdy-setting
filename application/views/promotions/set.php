<section class="content">
    <div class="col-xs-12">
        <div class="box">
            <form id="promotion">
                <div class="box-body">
                    <div class="row">
                        <table class="table table-bordered table-hover" id="table1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td colspan="6"><?=$provider->provider_title?> ประจำ <?=$month?></td>
                                </tr>
                                <tr>
                                   <td style="text-align: center;width: 100px;">Date</td>
                                   <td style="text-align: center;">Title</td>
                                   <td style="text-align: center;">Desc</td>
                                   <td>Image URL</td>
                                   <td style="text-align: center;width: 100px;">Dis</td>
                                   <td style="text-align: center;width: 100px;">Max</td>
                               </tr>
                           </thead>
                           <tbody>
                            <?php
                            $dateFormat=date_create($month.'-01');
                            $month=date_format($dateFormat,"m");
                            $year=date_format($dateFormat,"Y");
                            $d=cal_days_in_month(CAL_GREGORIAN, $month, $year);
                            for ($i=1; $i <= $d; $i++) {
                                $date = $this->promotion->add_zero_date($i);
                                $key = date_format($dateFormat,"Y-m-".$date);
                                if (isset($promotions[$key])) {
                                    $item = $promotions[$key][0];
                                } else {
                                    $item = array();
                                }
                                $item = json_decode(json_encode($item));
                                $item = $this->promotion->parse_to_table($item);
                                ?>
                                <tr>
                                    <input type="hidden" name="number[]" value="<?=$item->promotion_number?>">
                                    <input type="hidden" name="provider_id[]" value="<?=$provider->provider_id?>">
                                    <input type="hidden" name="provider_name[]" value="<?=$provider->provider_title?>">
                                    <input type="hidden" name="provider_category[]" value="<?=$provider->category_name?>">
                                    <input type="hidden" name="provider_region[]" value="<?=$provider->provider_region?>">
                                    <td style="text-align: center;">
                                        <?=$key?>
                                        <input type="hidden" name="date[]" value="<?=$key?>">
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="title[]" value="<?=$item->promotion_title?>" require="" />
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="desc[]" style="width: 100%;resize: none;"><?=$item->promotion_desc?></textarea>
                                    </td>
                                    <td>
                                        <input class="form-control" type="text" name="image[]"
                                        value="<?=$item->promotion_image_url?>" require="" />
                                    </td>
                                    <td>
                                        <input style="text-align: right;" class="form-control" type="number" name="dis[]" value="<?=$item->promotion_dis_price?>" max="100" require="" />
                                    </td>
                                    <td>
                                        <input style="text-align: right;" class="form-control" type="number" name="qty[]" value="<?=$item->promotion_max_qty?>" max="100" require="" />
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-success">Save</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        handleFormPromotionSubmit();
    });

    function handleFormPromotionSubmit() {
        $('#promotion').on('submit', function(e) {
            e.preventDefault();
            if (confirm('โปรดยืนยัน')) {
                const body = $(this).serialize();
                $('.black-screen').show();
                $.ajax({
                    url: BASE_URL+'admin/api/promotions/create',
                    type: 'POST',
                    data: body,
                    success: function(data) {
                        $('.black-screen').hide();
                        alert('สำเร็จ');
                        location.reload();
                    }
                })
            }
        });
    }
</script>