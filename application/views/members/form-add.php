<form role="form" id="form-add">
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
        <input type="text" class="form-control" name="member_name" placeholder="ชื่อ - สกุล" required="">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="member_username" placeholder="Username" required="">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" class="form-control" name="member_password" placeholder="Password" required="">
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>