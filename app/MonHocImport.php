<?php

namespace App;

use App\MonHoc;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use PhpOffice\PhpSpreadsheet\Shared\Date;

class MonHocImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
      return new MonHoc([
         'ten_mon_hoc' => $row['ten_mon_hoc'],
      ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}