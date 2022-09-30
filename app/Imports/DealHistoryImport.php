<?php

namespace App\Imports;

use App\Models\DealHistory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DealHistoryImport implements ToModel,WithHeadingRow
{

    public $data;
    public function __construct()
    {
    $this->data = collect();
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       $model = DealHistory::firstOrCreate([
            'Deal' => $row['deal'],
            ], [
            'Ids' => $row['ids'],
            'Orders' => $row['order'],
            'Position' => $row['position'],
            'Login' => $row['login'],
            'Name' => $row['name'],
            'Time' => $row['time'],
            'Type' => $row['type'],
            'Entry' => $row['entry'],
            'Symbol' => $row['symbol'],
            'Volume' => $row['volume'],
            'Price' => $row['price'],
            'SL' => $row['s_l'],
            'TP' => $row['t_p'],
            'Reason' => $row['reason'],
            'Commission' => $row['commission'],
            'Fee' => $row['fee'],
            'Swap' => $row['swap'],
            'Profit' => $row['profit'],
            'Dealer' => $row['dealer'],
            'Currency' => $row['currency'],
            'Comment' => $row['comment']
        ]);
        $this->data->push($model);
        return $model;
    }
}
