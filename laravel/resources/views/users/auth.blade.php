<script>
    var token = /access_token=([^&]+)/.exec(document.location.hash)[1];
    window.location.href = '/api/users/yauth?access_token=' + token;
</script>
