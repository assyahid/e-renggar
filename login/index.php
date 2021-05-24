<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Renggar BBLK Palembang | Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
  <link rel="stylesheet" href="toastr/toastr.min.css">

  <?php include'../config.php'; ?>
</head>
<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="../image/logo.png" alt="IMG" height="300" width="250">
        </div>

        <div class="login100-form validate-form">
          <span class="login100-form-title">
            E-Renggar
          </span>

          <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
           <select name="nama" id="nama" class="select2 input100">
            <option disabled="" selected>Pilih Pengguna</option>
            <?php 
            include '../config.php';
            $sql = "SELECT * FROM users";
            $kat = mysqli_query($koneksi,$sql);
                                // print_r($kat); 
            while ($a = mysqli_fetch_array($kat)) {?>
             <option value="<?php echo $a['nama'];?>"><?php echo $a['nama'];?></option>";
           <?php }
           ?>
         </select>
         <span class="focus-input100"></span>
         <span class="symbol-input100">
          <i class="fa fa-user" aria-hidden="true"></i>
        </span>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Password is required">
        <input class="input100" type="password" name="password" id="password" placeholder="Password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
          <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
      </div>
      
      <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn btn-login">
          Login
        </button>
      </div>

      <div class="text-center p-t-12">
            <!-- <span class="txt1">
              Forgot
            </span>
            <a class="txt2" href="#">
              Username / Password?
            </a> -->
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="#">
              jika ada kendala hubungi Tim IT
              <!-- <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i> -->
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  

  
  <!--===============================================================================================-->  
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>

  <script type="text/javascript" src="sweetalert2/sweetalert2.js"></script>
  <!-- Toastr -->
  <script src="toastr/toastr.min.js"></script>
  <!-- InputMask -->
  <script src="moment/moment.min.js"></script>

  <script>
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