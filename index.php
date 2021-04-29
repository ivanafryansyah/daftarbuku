<?php include('koneksi.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Buku</title>
    <link href='https://css.gg/css' rel='stylesheet'>
    <style type="text/css">
    * {
        font-family: "Trebuchet MS"; 
    }
    h1 {
        text-transform: uppercase;
        color: #7289DA; 
      }
    body {
        background: url('background.jpg');
        color: #fff; 
    }
    table {        
        border-collapse: collapse;
        border-spacing: 0;
        border-radius: 15px;
        width: 70%;
        margin: 10px auto 10px auto; 
        background-color: #404040;
        color: #ffffff; box-shadow: 7px 7px 10px rgba(0,0,0,0.8); 
    } 
    table thead th {
        background-color: #7289DA; 
        color: #ffffff;
        padding: 10px;
        text-align: left;
        text-decoration: none; 
    }
    table tbody td {
        border-radius: 15px;
        color: #ffffff;
        padding: 10px;  
    }
    a {
        background-color: #7289DA;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
        border-radius: 6px;
        
    }
    
    </style>
</head>
<body>
    <center><h1>Daftar Buku</h1></center>
    <center><a href="tambah_buku.php">Tambah Buku</a></center>
    <i class="gg- {pen} "></i>
    &nbsp
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = "SELECT * FROM buku ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);

                if(!$result){
                    die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_errpr($koneksi));
                }
                $no = 1;
                while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['pengarang']; ?></td>
                <td><?php echo $row['penerbit']; ?></td>
                <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
                <td>
                    <a href="edit_buku.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php
                $no++; //untuk nomor urut terus bertambah 1
                }
            ?>
        </tbody>
    </table>
</body>
</html>