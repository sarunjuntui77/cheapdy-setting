
    <div class="form-group">
        <label>Provider</label>
        <select class="form-control select2" name="provider" style="width: 100%;">
            <?php
            foreach ($providers as $key => $provider) {
                ?>
                <option value="<?=$provider->provider_id?>,<?=$provider->provider_title?>">
                    <?=$provider->provider_title?>
                </option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="hidden" name="member_number" value="<?=$member->member_number?>">
        <input type="text" class="form-control" name="member_name" placeholder="ชื่อ - สกุล" required="" value="<?=$member->member_name?>">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="member_username" placeholder="Username" required="" value="<?=$member->member_username?>">
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>

<script type="text/javascript">

    $(document).ready(function() {
        $('select[name=provider]').val('<?=$member->provider_id?>,<?=$member->provider_title?>').trigger("change");
        handleUpdateSubmit();
    });

    
</script>