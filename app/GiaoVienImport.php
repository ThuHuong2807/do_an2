<?php

namespace App;

use App\GiaoVien;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class GiaoVienImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
      return new GiaoVien([
         'ten_giao_vien' => $row['ten_giao_vien'],
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