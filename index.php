<?php include('koneksi.php');?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Daftar Buku</title>
    <style type="text/css">
        body {
            overflow-x: hidden;
            background-color: #F1FEFF;
            font-family: 'Mulish', sans-serif;
        }
        h1 {
            color: #3E3E3E;
            font-weight: 800;
        }
        p {
            color: #75787E;
            padding-top: 2%;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 3%;">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Daftar Buku</h1>
            </div>
        </div>
        <div class="container-fluid" style="margin-top: 3%;">
            <div class="card">
                <div class="card-header" style="padding: 15px;">
                    <div class="row">
                        <div class="col-md-6">
                            <a type="button" class="btn btn-primary" style="color: white;" href="tambah_buku.php">Tambah Buku</a>
                        </div>
                        <div class="col-md-6 text-end">
                            <a type="button" class="btn btn-primary" style="color: white;" href="mainpage.php">Home</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="margin-top: 1%;">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" cellspacing="0">
                            <thead>
                                <tr class="bg-success" style="color: white;">
                                <th>No</th>
                                    <th>Judul</th>
                                    <th>Pengarang</th>
                                    <th>Penerbit</th>
                                    <th>Jumlah</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM buku ORDER BY id_buku ASC";
                                    $result = mysqli_query($koneksi, $query);

                                    if(!$result){
                                        die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
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
                                    <td><?php echo $row['jumlah']; ?></td>
                                    <td style="text-align: center;"><img src="uploads/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
                                    <td>
                                    <a type="button" class="btn btn-primary" style="color: white;" href="edit_buku.php?id_buku=<?php echo $row['id_buku']; ?>">Edit</a>
                                    <a type="button" class="btn btn-danger" style="margin-left: 4px" href="hapus.php?id_buku=<?php echo $row['id_buku']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $no++; //untuk nomor urut terus bertambah 1
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>