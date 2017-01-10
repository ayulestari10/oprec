<div class="container">
	<div class="row">
	    <div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2" id="log">
            <h1 style="font-size: 400%; color: #424242" >LOGIN</h1>
            <form action="<?= base_url('index.php/login/peserta') ?>" method="post">
                <div class="form-group">
                    <!-- <label for="NIM">Nomor Induk Mahasiswa / NIM</label> -->
                    <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa">
                </div>
                <div class="form-group">
                    <!-- <label for="password">Password</label> -->
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <input type="submit" name="login" id="btn-login" class="btn btn-warning btn-lg btn-block" value="Login">
            </form>
            <hr>    	    
		</div> <!-- /.col-xs-12 -->
	</div> <!-- /.row -->
</div> <!-- /.container -->
<script type="text/javascript">
    function showPassword() {
        
        var key_attr = $('#key').attr('type');
        
        if(key_attr != 'text') {
            
            $('.checkbox').addClass('show');
            $('#key').attr('type', 'text');
            
        } else {
            
            $('.checkbox').removeClass('show');
            $('#key').attr('type', 'password');
            
        }
        
    }
</script>