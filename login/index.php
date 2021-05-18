<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="toastr/toastr.min.css">

    <title>E-Renggar | Login</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../image/coversimka.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4">Login untuk masuk ke halaman utama.</p>
            </div>
            
              <div class="form-group first">
                <label for="nama">Nama</label>
                <select name="nama" id="nama" class="select2 form-control">
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

              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Log In"  class="btn btn-login btn-block btn-primary">

              <!-- <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span> -->
             <!--  
              <div class="social-login">
                <a href="#" class="facebook btn d-flex justify-content-center align-items-center">
                  <span class="icon-facebook mr-3"></span> Login with Facebook
                </a>
                <a href="#" class="twitter btn d-flex justify-content-center align-items-center">
                  <span class="icon-twitter mr-3"></span> Login with  Twitter
                </a>
                <a href="#" class="google btn d-flex justify-content-center align-items-center">
                  <span class="icon-google mr-3"></span> Login with  Google
                </a>
              </div> -->
        
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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

                } else if(response == "success-pegawaipns") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "../pegawai_pns";
                  });

                } else if(response == "success-pegawainonpns") {

                  Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil!',
                    text: 'Anda akan di arahkan dalam 3 Detik',
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "../pegawai_non_pns";
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