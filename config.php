<?php
// config.php - Enhanced Database Configuration

// Database configuration
$db_config = [
    'host' => 'localhost',
    'dbname' => 'portofolio_db',
    'username' => 'root',
    'password' => '', // Sesuaikan dengan password MySQL Anda
    'charset' => 'utf8mb4'
];

// PDO options untuk keamanan dan performa
$pdo_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
];

try {
    // Create PDO connection
    $dsn = "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}";
    $pdo = new PDO($dsn, $db_config['username'], $db_config['password'], $pdo_options);
    
    // Set timezone
    $pdo->exec("SET time_zone = '+07:00'"); // Timezone Indonesia (WIB)
    
} catch (PDOException $e) {
    // Log error dan tampilkan pesan user-friendly
    error_log("Database Connection Error: " . $e->getMessage());
    
    // Jangan tampilkan detail error di production
    if (isset($_ENV['DEBUG']) && $_ENV['DEBUG'] === 'true') {
        die("Database Connection Failed: " . $e->getMessage());
    } else {
        die("Maaf, terjadi masalah koneksi database. Silakan coba lagi nanti.");
    }
}

// Helper function untuk escape HTML
function escape_html($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// Helper function untuk format tanggal Indonesia
function format_tanggal_indonesia($tanggal) {
    $bulan = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];
    
    $timestamp = strtotime($tanggal);
    $hari = date('d', $timestamp);
    $bulan_nama = $bulan[(int)date('m', $timestamp)];
    $tahun = date('Y', $timestamp);
    $jam = date('H:i', $timestamp);
    
    return "$hari $bulan_nama $tahun, $jam WIB";
}

// Helper function untuk validasi email
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
?>