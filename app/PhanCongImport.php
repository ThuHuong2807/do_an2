<?php

namespace App;

use App\PhanCong;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PhanCongImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        dd($row);
        return new PhanCong([
            'ten_giao_vien'       => $row['ten_giao_vien'],
            'ten_lop'             => $row['ten_lop'],
            'ten_mon_hoc'         => $row['ten_mon_hoc'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}