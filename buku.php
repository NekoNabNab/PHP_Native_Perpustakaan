<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- Header -->
    <?php 
        include "header.php";
    ?>
    <div class="container-fluid">
        
        <div class="row">
            <!-- Side Bar -->
            <?php 
                include "sidebar.php";
            ?>

            <!-- Main Tambah Kelas -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Daftar Buku</h1>
                </div>

                <div class="row">
                    <?php 
                    include "koneksi.php";
                    $qry_buku=mysqli_query($conn,"select * from buku");
                    while($dt_buku=mysqli_fetch_array($qry_buku)){
                    ?>
                    <div class="col-md-3">
                        <div class="card mt-3" >

                            <img src="assets/foto_produk/<?=$dt_buku['foto']?>" height="260px">

                            <div class="card-body">
                            <h5 class="card-title"><?=$dt_buku['nama_buku']?></h5>
                            <p class="card-text"><?=substr($dt_buku['deskripsi'], 0,30)?></p>
                            <a href="pinjam_buku.php?id_buku=<?=$dt_buku['id_buku']?>" class="btn btn-primary">Pinjam</a>
                            </div>
                            </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    <div>
                    <br>
                    <!-- <a href="tambah_buku.php" class="btn btn-primary">Tambah Buku</a> -->
                </div>
            </main>
        </div>
    </div>
</body>
</html>


