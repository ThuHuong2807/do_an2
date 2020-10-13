<?php

namespace App;

use App\Lop;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use PhpOffice\PhpSpreadsheet\Shared\Date;

class LopImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
      return new Lop([
         'ten_lop' => $row['ten_lop'],
      ]);
    }
    public function headingRow(): int
    {
        return 1;
    }
}