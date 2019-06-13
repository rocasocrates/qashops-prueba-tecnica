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

        $outputFile = "final.xlsx";

// Files are loaded to PHPExcel using the IOFactory load() method
        $objPHPExcel1 = IOFactory::load($file1);
        $objPHPExcel2 = IOFactory::load($file2);

// Copy worksheets from $objPHPExcel2 to $objPHPExcel1
        foreach ($objPHPExcel2->getAllSheets() as $sheet) {

            $sheet->setTitle('Sheet2');
            $objPHPExcel1->addExternalSheet($sheet);
        }
        $objWriter = IOFactory::createWriter($objPHPExcel1, "Xlsx");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=$outputFile");
        header("Cache-Control: max-age=0");
        $objWriter->save('php://output');
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
