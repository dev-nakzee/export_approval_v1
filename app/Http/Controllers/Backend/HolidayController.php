<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Holidays;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.holiday.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.holiday.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(), [
            'holiday_name' => 'required',
            'holiday_date' => 'required',
        ]);
        $data = [
            'holiday_name' => $request->holiday_name,
            'holiday_date' => $request->holiday_date,
            'holiday_type' => $request->holiday_type,
        ];
        Holidays::create($data);
        return redirect()->route('holidays.list.index')->with([200, 'response', 'status'=>'success','message'=>'Holiday added successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Holidays::orderBy('holiday_id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('holiday', function($row){
                    return $row->holiday_name;
                })
                ->addColumn('date', function($row){
                    return $row->holiday_date;
                })
                ->addColumn('type', function($row){
                    $type = '';
                    if($row->holiday_type == 1) {
                        $type = 'RH';
                    } else {
                        $type = 'GH';
                    }
                    return $type;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('clients.edit', $row->holiday_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('clients.delete', $row->holiday_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'type'])
                ->escapeColumns([])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
