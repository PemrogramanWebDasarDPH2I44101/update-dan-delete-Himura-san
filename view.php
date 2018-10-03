<?php
    include("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Data</title>
    </head>
    <body>
        <a href="index.php"><button>Tambah</button></a>
        <table border="1" style="border-spacing: 0; text-align: center" width="80%" align="center">
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Option</th>
            </tr>
            <?php
                $query = $pdo -> prepare("SELECT * FROM tb_siswa");
                $query -> execute();

                $row = $query -> rowcount();
                if ($row == 0) {
                    ?>
                    <tr>
                        <td colspan="5"><br><h3>Data tidak ada..</h3><br></td>
                    </tr>
                    <?php
                } else {
                    while($data = $query -> fetch (PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['nim']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['tgl_lahir']; ?></td>
                            <td><a href="edit.php?id=<?php echo $data['id'];?>">Edit</a> | <a href="delete.php?id=<?php echo $data['id'];?>" onclick="return confirm('Apakah anda yakin ingin menghapusnya..?');">Hapus</a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
    </body>
</html>
