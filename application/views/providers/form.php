<form id="form">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">สร้างโปรโมชั่นรายเดือน</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>ชื่อร้าน</label>
                <input type="text" class="form-control" name="provider_title">
            </div>
            <div class="form-group">
                <label>คำอธิบาย</label>
                <textarea class="textarea" name="provider_content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            <div class="form-group">
                <label>ประเภท</label>
                <select class="form-control select2" name="category">
                    <?php
                    foreach ($categories as $key => $item) {
                        ?>
                        <option value="<?php echo $item->category_id; ?>|<?php echo $item->category_name; ?>"><?php echo $item->category_name; ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>รูปภาพหลัก</label>
                <input type="text" class="form-control" name="provider_image_url">
            </div>
            <div class="form-group">
                <label>Link Youtube</label>
                <input type="text" class="form-control" name="provider_vdo_url">
            </div>
            <div class="form-group">
                <label>Latitude</label>
                <input type="text" class="form-control" name="provider_lat">
            </div>
            <div class="form-group">
                <label>Longtitude</label>
                <input type="text" class="form-control" name="provider_long">
            </div>
            <div class="form-group">
                <label>เบอร์โทรศัพท์</label>
                <input type="text" class="form-control" name="provider_phone">
            </div>
            <div class="form-group">
                <label>
                    Gallery
                    <button type="button" class="btn btn-success" id="add-gallery">เพิ่ม</button>
                </label>
                <gallery>
                    <input type="text" class="form-control" name="provider_gallery[]">
                </gallery>
            </div>
            <div class="form-group">
                <label>ที่อยู่</label>
                <textarea name="provider_address" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            <div class="form-group">
                <label>Facebook</label>
                <input type="text" class="form-control" name="provider_facebook">
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </div>
</div>
</form>