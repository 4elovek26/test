<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExcelRequest;
use App\Http\Resources\RowsResource;
use App\Imports\UsersImport;
use App\Models\Row;

class ExcelLoadController extends Controller
{
    public function loadExcelFile(ExcelRequest $request)
    {
        $request->file('excel')->storeAs('', 'test.xlsx');
        (new UsersImport)->queue('test.xlsx', 'local',\Maatwebsite\Excel\Excel::XLSX);
    }

    public function getRows()
    {
        $rows = Row::query()->get()->groupBy('created_at');
        return [
            'data' => RowsResource::collection($rows),
        ];
    }
}
