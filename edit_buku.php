<?php
  include('koneksi.php'); 

  if(isset($_GET['id'])) {
      $id       = $_GET["id"];
      $query    = "SELECT * FROM buku where id = '$id'";
      $result   = mysqli_query($koneksi, $query);

      if(!$result) {
          die("Query Error:".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
      }
      $data = mysqli_fetch_assoc($result);

      if(!count($data)){
        echo "<script>alert('Data yang anda cari tidak ditemukan');window.location='index.php';</script>";    
      }

  } else {
      echo "<script>alert('Masukkan data yang ingin diedit');window.location='index.php';</script>";
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Buku perpus</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #7289DA; 
      }
      body {
        background: url('Y9qnxN1.jpg');
        color: #fff
        }
    button {
          background-color: #7289DA;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;   
          margin-right: 250px;    
          border-radius: 6px;  
    }
    label {
      margin-top: 10px;
      float: left;
      
      text-align: left;
      width: 100%;  
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;  
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #434343; 
      box-shadow: 7px 7px 10px rgba(0,0,0,0.4); 
      border-radius: 15px;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Buku <?php echo $data['judul']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <input name="id" value="<?php echo $data['id']; ?>" hidden />
        <div>
          <label>Judul</label>
          <input type="text" name="judul" autofocus="" required="" value="<?php echo $data['judul'];?>" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" required="" value="<?php echo $data['pengarang'];?>" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required="" required="" value="<?php echo $data['penerbit'];?>" />
        </div>
        <div>
            <label>Gambar</label>
            <img src="gambar/<?php echo $data['gambar']; ?>"  style="width: 120px;float: left;margin-bottom: 5px;">
            <input type="file" name="gambar" required="" />
            <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar Buku</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan Data</button>
        </div>
        </section>
      </form>
  </body>
</html>