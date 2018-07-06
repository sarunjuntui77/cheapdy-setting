<form id="form">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">สร้างโปรโมชั่นรายเดือน</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>Provider</label>
                <select class="form-control select2" name="provider" style="width: 100%;">
                    <?php
                    foreach ($providers as $key => $provider) {
                        ?>
                        <option value="<?=$provider->provider_id?>">
                            <?=$provider->provider_title?> | <?=$provider->provider_id?>    
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>ปี</label>
                <select class="form-control" name="year">
                    <?php
                    $date = date('Y')+543;
                    for ($i = 0; $i < 10 ; $i++) {
                        ?>
                        <option><?=$date+$i?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>เดือน</label>
                <select class="form-control" name="month">
                    <?php
                    foreach (THAI_MONTH as $key => $month) {
                        ?>
                        <option value="<?=$key+1?>"><?=$month?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="col-xs-12 col-md-2">
                <button type="submit" class="btn btn-block btn-success btn-lg">Submit</button>
            </div>
        </div>
    </div>
</form>