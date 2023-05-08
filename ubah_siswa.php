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
                    <h1 class="h2">Tampil Siswa</h1>
                </div>

                <?php
                    include "koneksi.php";
                    $qry_get_siswa=mysqli_query($conn,"select * from siswa where id_siswa = '".$_GET['id_siswa']."'");
                    $dt_siswa=mysqli_fetch_array($qry_get_siswa);
                ?>
                <form action="proses_ubah_siswa.php" method="post">
                    <input type="hidden" name="id_siswa" value="<?=$dt_siswa['id_siswa']?>" class="form-control" > <br>
                        
                    Nama Siswa :
                    <input type="text" name="nama_siswa" value= "<?=$dt_siswa['nama_siswa']?>" class="form-control"> <br>
                        
                    Tanggal Lahir : 
                    <input type="date" name="tanggal_lahir" value="<?=$dt_siswa['tanggal_lahir']?>" class="form-control"> <br>
                        
                    Gender : 
                    <?php
                        $arr_gender=array('L'=>'Laki-laki','P'=>'Perempuan');
                    ?>
                    <select name="gender" class="form-control">
                        <option></option>
                        <?php foreach ($arr_gender as $key_gender => $val_gender):
                            if($key_gender==$dt_siswa['gender']){
                                $selek="selected";
                            } 
                            else {
                                $selek="";
                            }
                        ?>
                        <option value="<?=$key_gender?>"
                        <?=$selek?>><?=$val_gender?></option>
                        <?php endforeach ?>
                    </select> <br>
                        Alamat : 
                    <textarea name="alamat" class="form-control" rows="4"><?=$dt_siswa['alamat']?></textarea> <br>
                        Kelas :
                    <select name="id_kelas" class="form-control"> <br>
                        <option></option>
                        <?php
                            include "koneksi.php";
                            $qry_kelas=mysqli_query($conn,"select * from kelas");
                            while($data_kelas=mysqli_fetch_array($qry_kelas)){
                                if($data_kelas['id_kelas']==$dt_siswa['id_kelas']){
                                    $selek="selected";
                                } 
                                else {
                                    $selek="";
                                }
                                echo '<option value="'.$data_kelas['id_kelas'].'"'.$selek.'>'.$data_kelas['nama_kelas'].'</option>'; 
                            }
                        ?>
                    </select> <br>
                            Username : 
                        <input type="text" name="username" value="<?=$dt_siswa['username']?>" class="form-control"> <br>
                            Password : 
                        <input type="password" name="password" value="" class="form-control"> <br>
                        <input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-primary">
                </form>

                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </main>
        </div>
    </div>
</body>
</html>