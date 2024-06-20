<?php

namespace App\Imports;

use App\Models\StudentScore;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentScoreImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {

        dd($rows);
        foreach ($rows as $row) {
            // Store data in the database
            dd($row);
            StudentScore::create([
                'course_title' => $row[0],
                'course_code' => $row[1],
                'student_reg_no' => $row[2],
                'ca_score' => $row[3],
                'exam_score' => $row[4],
                'practical_score' => $row[5],
                'total_score' => $row[6],
            ]);
        }
    }
}
