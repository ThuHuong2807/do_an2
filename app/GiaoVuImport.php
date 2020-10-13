<?php

namespace App;

use App\GiaoVu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class GiaoVuImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
      return new GiaoVu([
         'ten_giao_vu' => $row['ten_giao_vu'],
         'ngay_sinh'     => date_format(Date::excelToDateTimeObject($row['ngay_sinh']),'Y-m-d'), 
         'gioi_tinh'     => $row['gioi_tinh'],
         'email'         => $row['email'],
         'so_dien_thoai' => $row['so_dien_thoai'],
         'mat_khau'      => $row['mat_khau'],
         'dia_chi'       => $row['dia_chi'],
      ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}