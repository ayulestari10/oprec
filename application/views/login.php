<div class="container">
	<div class="row">
	    <div class="col-xs-8 col-xs-offset-2 col-md-8 col-md-offset-2" id="log">
            <h1 style="font-size: 400%; color: #424242" >LOGIN</h1>
            <form action="<?= base_url('index.php/login/peserta') ?>" method="post">
                <div class="form-group">
                    <!-- <label for="NIM">Nomor Induk Mahasiswa / NIM</label> -->
                    <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" onkeyup="validAngka(this)">
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
    function validAngka(a)
    {
        if(!/^[0-9.]+$/.test(a.value))
        {
        a.value = a.value.substring(0,a.value.length-1000);
        }
    }
</script>