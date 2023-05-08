<?php
    if($_POST){
        $id_buku=$_POST['id_buku'];
        $nama_buku=$_POST['nama_buku'];
        $deskripsi=$_POST['deskripsi'];
        $foto=$_POST['foto'];
        $pengarang=$_POST['pengarang'];
        if(empty($nama_buku)){
            echo "<script>alert('nama buku tidak boleh kosong');location.href='tambah_buku.php';</script>";
        } else {
            include "koneksi.php";
            if(empty($password)){
                $update=mysqli_query($conn,"update buku set 
                nama_buku='".$nama_buku."',
                deskripsi='".$deskripsi."', 
                foto='".$foto."', 
                pengarang='".$pengarang."', 
                where id_buku = '".$id_buku."' ") or
                die(mysqli_error($conn));
                if($update){
                    echo "<script>alert('Sukses update buku');location.href='tampil_buku.php';</script>";
                } 
                else {
                    echo "<script>alert('Gagal update buku');location.href='ubah_buku.php?id_buku=".$id_buku."';</script>";
                }
            } 
            else {
                $update=mysqli_query($conn,"update buku set 
                nama_buku='".$nama_buku."',
                deskripsi='".$deskripsi."', 
                foto='".$foto."', 
                pengarang='".$pengarang."', 
                id_kelas='".$id_kelas."' 
                where id_buku = '".$id_buku."'") or die(mysqli_error($conn));
                if($update){
                    echo "<script>alert('Sukses update buku');location.href='tampil_buku.php';</script>";
                } 
                else {
                    echo "<script>alert('Gagal update buku');location.href='ubah_buku.php?id_buku=".$id_buku."';</script>";
                }
            }
        }
    }
?>