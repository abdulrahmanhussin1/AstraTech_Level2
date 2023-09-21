<?php

namespace App\Imports;


use App\Models\MatchingData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MatchingDataImport implements ToModel , WithHeadingRow
{

    public function model(array $row)
    {
        // Select the first non-null value from 'arabic_desc', 'Arabic', or 'arabic', or provide a default value.
        $arabicDesc = $row['arabic_desc'] ?? $row['Arabic'] ?? $row['arabic'] ?? 'Default Value';
    
        return new MatchingData([
            'arabic_desc' => $arabicDesc,
        ]);
    }
    
}
