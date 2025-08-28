<?php
// Make sure you have installed PhpSpreadsheet via Composer:
// composer require phpoffice/phpspreadsheet

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hoa_management";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] == 0) {
    $fileTmpPath = $_FILES['excel_file']['tmp_name'];
    $spreadsheet = IOFactory::load($fileTmpPath);
    $sheet = $spreadsheet->getActiveSheet();
    $rows = $sheet->toArray();

    // Assuming first row is header
    for ($i = 1; $i < count($rows); $i++) {
        $row = $rows[$i];
        // Adjust indexes if your columns are different
        $name = $row[0];
        $phone = $row[1];
        $block_lot = $row[2];
        $phase = $row[3];
        $location = $row[4];
        $date_registration = $row[5];
        $date_expiration = $row[6];
        $status = $row[7];

        // Basic validation (skip empty rows)
        if (empty($name) || empty($phone)) continue;

        $stmt = $conn->prepare("INSERT INTO homeowners (name, phone, block_lot, phase, location, date_registration, date_expiration, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $phone, $block_lot, $phase, $location, $date_registration, $date_expiration, $status);
        $stmt->execute();
    }
    $conn->close();
    header("Location: index.php?import=success");
    exit();
} else {
    header("Location: index.php?import=fail");
    exit();
}
?>