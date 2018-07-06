<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>Backstore</b> Cheapdy</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">เข้าสู่ระบบเพื่อใช้งานระบบแอดมิน</p>
            <form id="login">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    $(document).ready(()=>{
        handleLoginSubmit();
    });
    function handleLoginSubmit() {
        $('#login').on('submit', function (e) {
            e.preventDefault();
            const data = $(this).serialize();
            $.ajax({
                url: BASE_URL+'admin/api/login',
                type: 'POST',
                data: data,
                success: function(data) {
                    successLoginSubmit(data);
                }
            })
        });
    }

    function successLoginSubmit(data) {
        if (data == 'SUCCESS') {
            alert('เข้าสู่ระบบสำเร็จ');
            location.reload();
        } else {
            alert('Username / Password ผิด');
        }
    }
</script>