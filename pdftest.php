<?php
include './AppManager.php';
$pm = AppManager::getPM();
require_once 'assests/plugins/dompdf/autoload.inc.php';
//$string = file_get_contents('pdf.php');
$student = $pm->fetchResult("SELECT * FROM student where id=" . $_GET['id']);
$scholarship = $pm->fetchResult("SELECT id, year,cutoff FROM scholarship");
$parents = $pm->fetchResult("SELECT parents_id FROM student where id=" . $_GET['id']);
$parent_id = $parents[0]['parents_id'];
$parent = $pm->fetchResult("SELECT * FROM parents where id=" . $parent_id);
$achivements = $pm->fetchResult("SELECT achievements_id FROM student where id=" . $_GET['id']);
$achive_id = $achivements[0]['achievements_id'];
$achive_res = $pm->fetchResult("SELECT name FROM achievements where id=" . $achive_id);
ob_start();
include "pdf.php";
$buffer = ob_get_contents();
ob_end_clean();

// reference the Dompdf namespace
use Dompdf\Dompdf;

$dompdf = new Dompdf();
//$dompdf->loadHtmlFile($file);
$dompdf->loadHtml($buffer);
$dompdf->setPaper('A4', '');
$dompdf->render();


$dompdf->stream('zps3student2details6pdf5212', array('Attachment' => 0));
?>