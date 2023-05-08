<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Siswa</title>

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
                    <h1 class="h2">Pinjam Buku</h1>
                </div>

                    <?php 
                        include "koneksi.php";
                        $qry_detail_buku=mysqli_query($conn,"select * from buku where id_buku = '".$_GET['id_buku']."'");
                        $dt_buku=mysqli_fetch_array($qry_detail_buku);
                    ?>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="assets/foto_produk/<?=$dt_buku['foto']?>" class="card-img-top">
                        </div>
                        <div class="col-md-8">
                            <form action="masukkankeranjang.php?id_buku=<?=$dt_buku['id_buku']?>" method="post">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <td>Nama Buku</td><td><?=$dt_buku['nama_buku']?></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td><td><?=$dt_buku['deskripsi']?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pinjam</td><td><input type="number" name="jumlah_pinjam" value="1"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input class="btn btn-success" type="submit" value="PINJAM"></td>
                                        </tr>
                                    </thead>
                                </table>
                            </form>
                        </div>
                    </div>

                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </main>
        </div>
    </div>
</body>
</html>





