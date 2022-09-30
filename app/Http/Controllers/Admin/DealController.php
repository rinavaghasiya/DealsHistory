<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\DealHistory;
use App\Models\Deal;
use App\Imports\DealHistoryImport;
use Excel;

class DealController extends Controller
{
    function index()
    {
        $data = DB::table('deal_histories')->orderBy('Deal', 'DESC')->paginate(15);
        return view('admin.deal', compact('data'));
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */

    function importData(Request $request)
    {
      if ($request->file) {
        $file = $request->file;
        $extension = $file->getClientOriginalExtension(); //Get extension of uploaded file
        $fileSize = $file->getSize(); //Get size of uploaded file in bytes
        //Checks to see that the valid file types and sizes were uploaded
        $this->checkUploadedFileProperties($extension, $fileSize);
        $import = new DealHistoryImport();
        Excel::import($import, $request->file);
        foreach ($import->data as $user) {
        //sends email to all users
        }
        //Return a success response with the number if records uploaded
        return response()->json([
        'message' => $import->data->count() ." records successfully uploaded"
        ]);
        } else {
        throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }
        }
        /**
        * Checks to see that the uploaded file valid and within acceptable size limits
        *
        * @param string $extension
        * @param integer $fileSize
        * @return void
        */
        public function checkUploadedFileProperties($extension, $fileSize) : void
        {
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
        $maxFileSize = 2097152; // Uploaded file size limit is 2mb
        if (in_array(strtolower($extension), $valid_extension)) {
        if ($fileSize <= $maxFileSize) {
        } else {
        throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error
        }
        } else {
        throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
        }
    }


    /**
     * @param $customer_data
     */

    public function ExportExcel($customer_data)
    {

        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');

        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($customer_data);
            $Excel_writer = new Xls($spreadSheet);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');

            exit();
        } catch (Exception $e) {
            return;
        }
    }
    /**

     *This function loads the customer data from the database then converts it

     * into an Array that will be exported to Excel

     */

    function exportData()
    {
        $data = DB::table('deal_histories')->orderBy('Deal', 'DESC')->get();
        $data_array[] = array("Deal", "ID", "Orders", "Position", "Login", "Name","Time","Type","Entry","Symbol","Volume","Price","SL","TP",
    "Reason","Commission","Fee","Swap","Profit","Dealer","Currency","Comment");

        foreach ($data as $data_item) {
            $data_array[] = array(
                'Deal' => $data_item->Deal,
                'ID' => $data_item->Ids,
                'Orders' => $data_item->Orders,
                'Position' => $data_item->Position,
                'Login' => $data_item->Login,
                'Name' => $data_item->Name,
                'Time' => $data_item->Time,
                'Type' => $data_item->Type,
                'Entry' => $data_item->Entry,
                'Symbol' => $data_item->Symbol,
                'Volume' => $data_item->Volume,
                'Price' => $data_item->Price,
                'SL' => $data_item->SL,
                'TP' => $data_item->TP,
                'Reason' => $data_item->Reason,
                'Commission' => $data_item->Commission,
                'Fee' => $data_item->Fee,
                'Swap' => $data_item->Swap,
                'Profit' => $data_item->Profit,
                'Dealer' => $data_item->Dealer,
                'Currency' => $data_item->Currency,
                'Comment' => $data_item->Comment
            );
        }
        $this->ExportExcel($data_array);
    }
}
