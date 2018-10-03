<?php
    include("config.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = $pdo -> prepare("SELECT * FROM tb_siswa WHERE id = $id");
        $query -> execute();

        $row = $query -> rowcount();
        $data = $query -> fetch (PDO::FETCH_ASSOC);
    } else {
        header("Location: view.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Data - <?php echo $data['nama'];?></title>
    </head>
    <body>
        <a href="view.php"><button>Back</button></a>
        <form method="post">
            <pre>
                Nama      : <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br>
                NIM       : <input type="text" name="nim" pattern="\d*" maxlength="10" value="<?php echo $data['nim']; ?>" required><br>
                Tgl Lahir : <input type="date" name="tgl_lahir" value="<?php echo $data['tgl_lahir']; ?>" required><br>
                            <input type="submit" value="Ubah">
            </pre>
        </form>
    </body>
</html>
<?php
    if (isset($_POST['nama'])) {
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $tgl_lahir = $_POST['tgl_lahir'];

        $query = $pdo -> prepare("UPDATE tb_siswa SET nama = '$nama', nim = '$nim', tgl_lahir = '$tgl_lahir' WHERE id = '$id' ");
        $query -> execute();

        if ($query) {
            ?>
            <script>
                alert("Data Berhasil Terubah..");
                location = "view.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data Gagal Terubah..");
                location = "view.php";
            </script>
            <?php
        }
    }
?>
