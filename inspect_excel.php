<?php
require __DIR__ . '/vendor/autoload.php';

$xlsx = __DIR__ . '/bdd/politecnicosanvalerobdd.xlsx';
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($xlsx);
$spreadsheet = $reader->load($xlsx);

foreach ($spreadsheet->getAllSheets() as $sheet) {
    echo 'HOJA: ' . $sheet->getTitle() . PHP_EOL;
    $rows = $sheet->toArray();
    foreach (array_slice($rows, 0, 8) as $row) {
        echo implode(' | ', array_map(function ($v) {
            return $v === null ? '' : (string) $v;
        }, $row)) . PHP_EOL;
    }
    echo '---' . PHP_EOL;
}
