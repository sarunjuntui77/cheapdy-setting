</div>
<script>
    handleLogout();

    function handleLogout() {
        $('#logout').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: BASE_URL+'admin/api/logout',
                type: 'POST',
                data: {
                    logout: true
                },
                success: function(data) {
                    successLogout(data);
                }
            });
        });
    }

    function successLogout(data) {
        if (data == 'SUCCESS') {
            window.location.assign(BASE_URL+'admin');
        } else {

        }

    }
</script>
</body>
</html>