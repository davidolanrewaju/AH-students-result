<?php

namespace App\Http\Controllers;

use App\Imports\StudentScoreImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentScoreController extends Controller
{
    public function import(Request $request) {
        $request->validate([
            'file' => 'required | mimes:xslx,xls,csv',
        ]);

        dd($request);

        $file = $request->file('file');

        dd('File upload successful');

        Excel::import(new StudentScoreImport, $file);

        dd($file);

        // return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
