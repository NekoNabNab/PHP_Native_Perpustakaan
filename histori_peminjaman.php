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
                    <h1 class="h2">History Peminjaman</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <!-- <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div> -->
                        <!-- <a href="history_peminjaman.php" type="button" class="btn btn-sm btn-outline-secondary">
                        <span data-feather="calendar"></span>
                        History Peminjaman Buku
                        </a> -->
                    </div>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <th>NO</th><th>Tanggal Pinjam</th><th>Tanggal harus Kembali</th><th>Nama Buku</th><th>Status</th><th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $qry_histori=mysqli_query($conn,"select * from peminjaman_buku order by id_peminjaman_buku desc");
                        $no=0;
                        while($dt_histori=mysqli_fetch_array($qry_histori)){
                            $no++;
                            //menampilkan buku yang dipinjam
                            $buku_dipinjam="<ol>";
                            $qry_buku=mysqli_query($conn,"select * from detail_peminjaman_buku join buku on buku.id_buku=detail_peminjaman_buku.id_buku where id_peminjaman_buku = '".$dt_histori['id_peminjaman_buku']."'");
                            while($dt_buku=mysqli_fetch_array($qry_buku)){
                                $buku_dipinjam.="<li>".$dt_buku['nama_buku']."</li>";
                            }
                            $buku_dipinjam.="</ol>";
                            //menampilkan status sudah kembali atau belum
                            $qry_cek_kembali=mysqli_query($conn,"select * from pengembalian_buku where id_peminjaman_buku = '".$dt_histori['id_peminjaman_buku']."'");
                            if(mysqli_num_rows($qry_cek_kembali)>0){
                                $dt_kembali=mysqli_fetch_array($qry_cek_kembali);
                                $denda="denda Rp. ".$dt_kembali['denda'];
                                $status_kembali="<label class='alert alert-success'>Sudah kembali <br>".$denda."</label>";
                                $button_kembali="";
                            } else {
                                $status_kembali="<label class='alert alert-danger'>Belum kembali</label>";
                                $button_kembali="<a href='kembali.php?id=".$dt_histori['id_peminjaman_buku']."' class='btn btn-warning' onclick='return confirm(\"Anda Yakin Ingin Mengembalikan?\")'>Kembalikan</a>";
                            }
                            ?>
                            <tr>

                            <td><?=$no?></td><td><?=$dt_histori['tanggal_pinjam']?></td><td><?=$dt_histori['tanggal_kembali']?></td>
                            <td><?=$buku_dipinjam?></td><td><?=$status_kembali?></td><td><?=$button_kembali?></td>
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