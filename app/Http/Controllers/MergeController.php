<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MergeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $file1 = public_path() . '/Fichero1.xlsx';
        $file2 = public_path() . '/Fichero2.xlsx';


        //$outputFile = "final.xlsx";

        $reader = IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);

        $merge = new Spreadsheet();
        $sheet = $merge->getActiveSheet();


        $spreadsheet1 = $reader->load($file1);


        $worksheet = $spreadsheet1->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

        for ($row = 1; $row <= $highestRow; ++$row) {

            for ($col = 1; $col <= $highestColumnIndex; ++$col) {
                $value = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                $sheet->setCellValueByColumnAndRow($col, $row, $value);

            }

        }

        $spreadsheet2 = $reader->load($file2);


        $worksheet2 = $spreadsheet2->getActiveSheet();
        $highestRow2 = $worksheet2->getHighestRow();
        $highestColumn2 = $worksheet2->getHighestColumn();
        $highestColumnIndex2 = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn2);
        $aux = $col;
        for ($row2 = 1; $row2 <= $highestRow2; ++$row2) {
              $col = $aux;
            for ($col2 = 1; $col2 <= $highestColumnIndex2; ++$col2) {
                $value = $worksheet2->getCellByColumnAndRow($col2, $row2)->getValue();
                $sheet->setCellValueByColumnAndRow($col, $row2, $value);

                $col++;

            }



        }
        $arr = array();
          $arrsheet = $merge->getActiveSheet();
        $highestRow3 = $arrsheet->getHighestRow();
        $highestColumn3 = $arrsheet->getHighestColumn();
        $highestColumnIndex3 = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn3);

        for ($row = 1; $row <= $highestRow3; ++$row) {

            for ($col = 1; $col <= $highestColumnIndex3; ++$col) {
                $value = $arrsheet->getCellByColumnAndRow($col, $row)->getValue();

                array_push($arr, $value);

            }



        }


     /*      $writer = new Xlsx($merge);
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment;filename="merge.xlsx"');
         header('Cache-Control: max-age=0');
        $writer->save('php://output');*/
       return view('merge', ['merge' => $arr]);

    }
// I'm going to describe a bit different:

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
