<!DOCTYPE html>
<html>
    <head>
        <title>Input Data</title>
    </head>
    <body>
        <a href="view.php"><button>View</button></a>
        <form method="post">
            <pre>
                Nama      : <input type="text" name="nama" required><br>
                NIM       : <input type="text" name="nim" pattern="\d*" maxlength="10" required><br>
                Tgl Lahir : <input type="date" name="tgl_lahir" required><br>
                            <input type="submit" value="Submit"> <input type="reset" value="Reset">
            </pre>
        </form>
    </body>
</html>
<?php
    include("config.php");

    if (isset($_POST['nama'])) {

        $nama = addslashes($_POST['nama']);
        $nim = $_POST['nim'];
        $tgl_lahir = $_POST['tgl_lahir'];

        $query = $pdo -> prepare("INSERT INTO tb_siswa(nama, nim, tgl_lahir) VALUE ('$nama','$nim','$tgl_lahir')");
        $query -> execute();

        if ($query) {
            ?>
            <script>
                alert("Data berhasil masuk..");
                location = "view.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data gagal masuk..");
            </script>
            <?php
        }
    }
?>
