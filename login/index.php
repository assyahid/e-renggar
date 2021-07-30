<?php include'../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>E-Renggar BBLK Palembang | Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.css">

	<link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
 	<link rel="stylesheet" href="toastr/toastr.min.css">

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-secondary-gradient">
			<h1 class="title fw-bold text-white mb-3">E-RENGGAR</h1>
			<p class="subtitle text-white op-7">RENCANA ANGGARAN<br>BALAI BESAR LABORATORIUM KESEHATAN PALEMBANG</p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
			<div class="container container-login container-transparent animated fadeIn">
				 <center><img src="../image/logo.png" alt="IMG" height="90" width="75"></center><br>
				<h3 class="text-center">Sign In</h3>
				<div class="login-form">
					<div class="form-group">
						<label for="username" class="placeholder"><b>Username</b></label>
						 <select name="nama" id="nama" class="form-control select2" style="width: 100%" required="">
				            <option disabled="" id="username" selected>Pilih Pengguna</option>
				            <?php 
				            
				            $sql = "SELECT * FROM users";
				            $kat = mysqli_query($koneksi,$sql);
				                                // print_r($kat); 
				            while ($a = mysqli_fetch_array($kat)) {?>
				             <option value="<?php echo $a['nama'];?>"><?php echo $a['nama'];?></option>";
				           <?php }
				           ?>
				         </select>
					</div>
					<div class="form-group">
						<label for="password" class="placeholder"><b>Password</b></label>
						<a href="#" class="link float-right">Forget Password ?</a>
						<div class="position-relative">
							<input id="password" name="password" type="password" class="form-control" required>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
					</div>
					<div class="form-group form-action-d-flex mb-3">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="rememberme">
							<label class="custom-control-label m-0" for="rememberme">Remember Me</label>
						</div>
						<!-- <a href="#" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold">Sign In</a> -->
						<button type="submit" class="btn btn-secondary col-md-5 float-right mt-3 mt-sm-0 fw-bold btn-login">Login</button>
					</div>
				<!-- 	<div class="login-account">
						<span class="msg">Don't have an account yet ?</span>
						<a href="#" id="show-signup" class="link">Sign Up</a>
						
					</div> -->
				</div>
			</div>

			<div class="container container-signup container-transparent animated fadeIn">
				<h3 class="text-center">Sign Up</h3>
				<div class="login-form">
					<div class="form-group">
						<label for="fullname" class="placeholder"><b>Fullname</b></label>
						<input  id="fullname" name="fullname" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="email" class="placeholder"><b>Email</b></label>
						<input  id="email" name="email" type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="passwordsignin" class="placeholder"><b>Password</b></label>
						<div class="position-relative">
							<input  id="passwordsignin" name="passwordsignin" type="password" class="form-control" required>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="confirmpassword" class="placeholder"><b>Confirm Password</b></label>
						<div class="position-relative">
							<input  id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
							<div class="show-password">
								<i class="icon-eye"></i>
							</div>
						</div>
					</div>
					<div class="row form-sub m-0">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="agree" id="agree">
							<label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
						</div>
					</div>
					<div class="row form-action">
						<div class="col-md-6">
							<a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
						</div>
						<div class="col-md-6">
							<a href="#" class="btn btn-secondary w-100 fw-bold">Sign Up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<script src="assets/js/atlantis.min.js"></script>
	<script type="text/javascript" src="sweetalert2/sweetalert2.js"></script>
  <!-- Toastr -->
  <script src="toastr/toastr.min.js"></script>
  <!-- InputMask -->
  <script src="moment/moment.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	 <script>
    $(document).ready(function() {
    $('.select2').select2();
});

    $(document).ready(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      
      $(".btn-login").click( function() {

        var nama = $("#nama").val();
        var password = $("#password").val();

        if (nama.length == "") {

          Swal.fire({
            icon: 'warning',
            title: 'Oops.. ',
            text: 'nama Wajib Diisi !'
          });


        } else if(password.length == "") {

          Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Password Wajib Diisi !'
          });

        } else {

            //ajax
            $.ajax({

              url: "login-proses.php",
              type: "POST",
              data: {
                "nama": nama,
                "password": password
              },

              success:function(response){
                // alert(response);
                if (response == "success-admin") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "../admin";
                  });

                  $("#nama").val('');
                  $("#password").val('');

                } else if(response == "success-kepala") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "../kepala";
                  });

                } else if(response == "success-operator") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "../operator";
                  });

                } else if(response == "success-kasubbag") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "../kasubbag";
                  });

                } else if(response == "success-koordinator") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "../koordinator";
                  });

                }else if(response == "success-instalasi") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "../instalasi";
                  });

                }else if(response == "success-subkoord") {
                  
                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "../kasi";
                  });

                } else {

                  Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal!',
                    text: 'silahkan coba lagi!'
                  });

                }

                console.log(response);

              },

              error:function(response){
                Swal.fire({
                  icon: 'error',
                  title: 'Opps!',
                  text: 'server error!'
                });
              }

            })

}

}); 

});
</script>
</body>
</html>