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
                    <h1 class="h2">Tampil Buku</h1>
                </div>

                <!-- Tabel Tampil Siswa -->
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>JUDUL BUKU</th>
                            <th>DESKRIPSI</th>
                            <th>GAMBAR</th>
                            <th>PENGARANG</th>
                            <th>TINDAKAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            $qry_buku=mysqli_query($conn,"select * from buku");
                            $no=0;
                            while($data_buku=mysqli_fetch_array($qry_buku)){
                                $no++;
                        ?>
                            <tr> 
                                <td><?=$no?></td>
                                <td><?=$data_buku['nama_buku']?></td>
                                <td><?=$data_buku['deskripsi']?></td>
                                <td><img src="assets/foto_produk/<?=$data_buku['foto']?>" height="260px"></td>
                                <td><?=$data_buku['pengarang']?></td>
                                <td>
                                    <a href="ubah_buku.php?id_buku=<?=$data_buku['id_buku']?>" class="btn btn-success mb-2">Ubah<a>
                                    <a href="hapus_buku.php?id_buku=<?=$data_buku['id_buku']?>" class="btn btn-danger mb-2" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></td>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>                     
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</body>
</html>