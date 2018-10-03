<?php
    include("config.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = $pdo -> prepare("DELETE FROM tb_siswa WHERE id = $id");
        $query -> execute();

        if ($query) {
            ?>
            <script>
                alert("Data Berhasil terhapus..!");
                location = "view.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Data gagal terhapus..!");
                location = "view.php";
            </script>
            <?php
        }
    }
?>
