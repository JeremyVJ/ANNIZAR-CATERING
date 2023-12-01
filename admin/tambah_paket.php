<?php
include("../connection/connect.php"); // Pastikan Anda memasukkan koneksi ke database yang sesuai

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $category = mysqli_real_escape_string($db, $_POST['selected_category']);
    
    // Mengunggah gambar paket
    $image = file_get_contents($_FILES['image']['tmp_name']);

    $insert_query = "INSERT INTO dishes_category (title, c_id, image) VALUES (?, ?, ?)";
    
    $stmt = mysqli_prepare($db, $insert_query);
    mysqli_stmt_bind_param($stmt, 'sis', $title, $category, $image);

    if (mysqli_stmt_execute($stmt)) {
        // Berhasil menambahkan paket
        echo "Paket berhasil ditambahkan.";
        
        header("Location: packageCat.php");
        exit();
    } else {
        echo "Gagal menambahkan paket: " . mysqli_error($db);
    }

    mysqli_stmt_close($stmt);
}
?>
