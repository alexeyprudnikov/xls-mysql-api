<?php
/**
 * Created by PhpStorm.
 * User: aprudnikov
 * Date: 2019-02-18
 * Time: 16:34
 */

namespace App\Utils;

use PhpOffice\PhpSpreadsheet\Reader\Csv as ReaderCsv;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Reader\Xls as ReaderXls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as ReaderXlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SpreadsheetHelper
{
    protected $xlsFile;
    public function __construct($xlsFile)
    {
        $this->xlsFile = $xlsFile;
    }

    /**
     * @return array
     * @throws Exception
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function parse(): array
    {
        $spreadsheet = $this->readFile($this->xlsFile);
        return $this->createDataFromSpreadsheet($spreadsheet);
    }

    /**
     * @param UploadedFile $file
     * @return Spreadsheet
     * @throws Exception
     */
    public function readFile(UploadedFile $file): Spreadsheet
    {
        $extension = $file->getClientOriginalExtension();
        switch ($extension) {
            case 'csv':
                $reader = new ReaderCsv();
                break;
            case 'xls':
                $reader = new ReaderXls();
                break;
            case 'xlsx':
                $reader = new ReaderXlsx();
                break;
            default:
                throw new \RuntimeException('Invalid extension');
        }
        $reader->setReadDataOnly(true);
        return $reader->load($file->getPathname());
    }

    /**
     * @param Spreadsheet $spreadsheet
     * @return array
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function createDataFromSpreadsheet(Spreadsheet $spreadsheet): array
    {
        $columns = [];
        $data = [];
        $worksheet = $spreadsheet->getActiveSheet();
        foreach ($worksheet->getRowIterator() as $row) {
            $rowIndex = $row->getRowIndex();
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $index = 0;
            foreach ($cellIterator as $cell) {
                if ($rowIndex === 1) {
                    $columns[$index] = $cell->getColumn();
                } else if ($rowIndex > 1) {
                    $data[$rowIndex][$columns[$index]] = $cell->getCalculatedValue();
                }
                $index++;
            }
        }
        return $data;
    }
}