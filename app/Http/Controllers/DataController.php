<?php

namespace App\Http\Controllers;

use App\Models\ExampleTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class DataController extends BaseController
{
    public function getData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order' => ['required', 'string'],
            'sort' => ['required', 'string'],
            'offset' => ['required', 'int'],
            'limit' => ['required', 'int'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'errors' => $validator->errors()->all()
            ], 401);
        }

        $orderBy = $request->input('order');
        $sortType = $request->input('sort');
        $offset = $request->input('offset');
        $limit = $request->input('limit');

        $count = ExampleTable::count();
        $rows = ExampleTable::select('id', 'name')
            ->orderBy($orderBy, $sortType)
            ->skip($offset)
            ->take($limit)
            ->get()
            ->toArray();

        $data = [
            'rows' => $rows,
            'count' => $count
        ];

        return response()->json($data, 200);
    }
}
