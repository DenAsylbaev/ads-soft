<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{

    public function searchByData(Request $request)
    {
        $searchParameters = $request->data;
        $records = Record::all();
        $searchResult = [];

        foreach ($searchParameters as $param) {
            foreach ($records as $record) {
                if (!empty(array_intersect($param, $record['data']))) {
                    $searchResult[] = $record;
                }
            }
        }
        return $searchResult;
    }

    public function getItem($id)
    {
        return Record::where('id', $id)->firstOrFail();
    }
}
