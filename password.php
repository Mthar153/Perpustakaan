<?php
// Password yang akan di-hash
$plainPassword = 'admin123';

// Menggunakan fungsi password_hash untuk membuat hash
$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);

// Menampilkan hasil hash
echo 'Hashed Password: ' . $hashedPassword;
?>