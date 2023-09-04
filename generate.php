<?php
require 'dompdf/autoload.inc.php';
require 'conn.php'; // Assuming this file contains your database connection code
use Dompdf\Dompdf;


$pdf = new Dompdf();
ob_start();
require 'bill.php'; // Include the content for your PDF bill here

$html = ob_get_contents();
ob_get_clean();

$pdf->loadHtml($html);
$pdf->setPaper('A4', 'portrait');

$pdf->render();

$pdf->stream('Bill.pdf', ['Attachment' => 0]);
?>
