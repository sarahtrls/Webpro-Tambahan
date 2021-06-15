
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../style.css">
    <title>Petshop.com</title>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="mainNav">
      <div class="container">
      <a class="navbar-brand text-white" href="<?= base_url(); ?>">pettoshop.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-white" href="<?= base_url(); ?>">Beranda </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="profile">Profil</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link text-white" href="growming" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Booking Grooming
            </a>
          </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="daftar_grooming"> Keranjang Pesanan </a>
            </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="logout">
              Logout
            </a>
          </li>
        </ul>
      </div>  
      </div>
    </nav>

    <div class="daftar" id="daftar">
        <div class="container">
          <h3 class="tittle"><br/><br/><br/><center>PAKET <span>GROOMING:</span></center> </h3>
          <form action="create_grooming" method="post" class="">
            <div class="form-group">
                  <label for="nama_lengkap"> Nama Pemilik : </label>
                  <input type="text" name="nama_lengkap" id="nama_lengkap" size ="100" class="form-control" required="" >
                </div>

                
                <select class="custom-select" name="paket">
                  <option selected>Pilih Paket</option>
                  <option value="Anjing">Anjing</option>
                  <option value="Kelinci">Kelinci</option>
                  <option value="Kucing">Kucing</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
      
                <div class="form-group">
                  <label for="tanggal">Tanggal </label>
                  <input type="date" name="tanggal" id="tanggal" size ="100" class="form-control" required="">
                </div>

                <select class="custom-select" name="waktu">
                  <option selected>Waktu</option>
                  <option value="Pagi">Pagi</option>
                  <option value="Siang">Siang</option>
                  <option value="Sore">Sore</option>
                </select>
      
                <div class="form-group">
                  <label for="no_telp">No Telepon : </label>
                  <input type="text" name="no_telp" id="no_telp" size ="100" class="form-control" required="">
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat : </label>
                  <input type="text" name="alamat" id="alamat" size ="100" class="form-control" required="">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Pesan Paket</button>
            </form>
          </div>
        </div>
      </div>
      
      <div class="container">
        <div class="row">
          <div class="col-md-12 mt-4">
            <div class="alert alert-right" role="alert">
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
  	<div class="row">
  		<div class="col-md-12 mt-4">
  			<div class="alert alert-right" role="alert">
  				<center>
  					<font color="black">@2021 Pettoshop</font>
  				</center>
  			</div>
  		</div>
  	</div>
  </div>


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>