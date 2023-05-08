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
                    <h1 class="h2">Tambah Buku</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
                    </div>
                    <!-- <a type="button" href="histori_peminjaman.php" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        Histori Peminjaman
                    </a> -->
                    </div>
                </div>

                <!-- <h3>Tambah Buku</h3> -->
                <form action="proses_tambah_buku.php" method="post" enctype="multipart/form-data">
                    Nama Buku :
                    <input type="text" name="nama_buku" value="" class="form-control">
                    Deskripsi : <br>
                    <textarea id="" name="deskripsi" rows="4" cols="50" required></textarea><br>
                    Pengarang:
                    <input type="text" name="pengarang" value="" class="form-control">
                    Foto Buku:
                    <input type="file" name="foto" value=""  class="form-control"> <br>
                    <input type="submit" name="simpan" value="Tambah Produk" class="btn btn-primary">

                </form>
            </main>
        </div>
    </div>
</body>
</html>
