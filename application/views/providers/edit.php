<?php
function check_seleced($item1, $item2) {
    return ($item1 == $item2)? ' selected="true" ':'';
}
?>
<div class="form-group">
    <input type="hidden" name="provider_id" value="<?php echo $provider->provider_id ?>">
    <label>ชื่อร้าน</label>
    <input value="<?php echo $provider->provider_title; ?>" type="text" class="form-control" name="provider_title">
</div>
<div class="form-group">
    <label>คำอธิบาย</label>
    <textarea class="textarea update" name="provider_content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $provider->provider_content; ?></textarea>
</div>
<div class="form-group">
    <label>ประเภท</label>
    <select class="form-control select2" name="category">
        <?php
        foreach ($categories as $key => $item) {
            ?>
            <option value="<?php echo $item->category_id; ?>|<?php echo $item->category_name; ?>" <?php echo check_seleced($provider->category_id, $item->category_id); ?>><?php echo $item->category_name; ?></option>
            <?php
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label>รูปภาพหลัก</label>
    <input value="<?php echo $provider->provider_image_url; ?>" type="text" class="form-control" name="provider_image_url">
</div>
<div class="form-group">
    <label>Link Youtube</label>
    <input value="<?php echo $provider->provider_vdo_url; ?>" type="text" class="form-control" name="provider_vdo_url">
</div>
<div class="form-group">
    <label>Latitude</label>
    <input value="<?php echo $provider->provider_lat; ?>" type="text" class="form-control" name="provider_lat">
</div>
<div class="form-group">
    <label>Longtitude</label>
    <input value="<?php echo $provider->provider_long; ?>" type="text" class="form-control" name="provider_long">
</div>
<div class="form-group">
    <label>เบอร์โทรศัพท์</label>
    <input value="<?php echo $provider->provider_phone; ?>" type="text" class="form-control" name="provider_phone">
</div>
<div class="form-group">
    <label>
        Gallery
        <button type="button" class="btn btn-success" id="edit-add-gallery">เพิ่ม</button>
    </label>
    <editgallery>
        <?php
        $gallery = explode(',', $provider->provider_gallery);
        foreach ($gallery as $key => $item) {
            ?>
            <input value="<?php echo $item ; ?>" type="text" class="form-control" name="provider_gallery[]">
            <?php
        }
        ?>
    </editgallery>
    
</div>
<div class="form-group">
    <label>ที่อยู่</label>
    <textarea name="provider_address" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $provider->provider_address; ?></textarea>
</div>
<div class="form-group">
    <label>Facebook</label>
    <input value="<?php echo $provider->provider_facebook; ?>" type="text" class="form-control" name="provider_facebook">
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.textarea.update').wysihtml5();
        $('#edit-add-gallery').on('click', function(e) {
            const inputElement = '<input type="text" class="form-control" name="provider_gallery[]">';
            $('editgallery').append(inputElement);

        });
    });
</script>