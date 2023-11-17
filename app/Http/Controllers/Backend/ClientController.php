<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\Clients;
use App\Models\Backend\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        $data = [
            'client_name' => $request->name,
            'client_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'client_content' => $request->client_content,
        ];
        Clients::create($data);
        return redirect()->route('clients.index')->with([200, 'response', 'status'=>'success','message'=>'Client created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = Clients::orderBy('client_id', 'DESC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('client_name', function($row){
                    return $row->client_name;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('clients.edit', $row->client_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('clients.delete', $row->client_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $client = Clients::where('client_id', $id)->first();
        $media = Media::where('media_id', $client->media_id)->first();
        return view('backend.clients.edit', compact('client', 'media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);
        $data = [
            'client_name' => $request->name,
            'client_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'client_content' => $request->client_content,
        ];
        Clients::where('client_id', $id)->update($data);
        return redirect()->route('clients.index')->with([200, 'response', 'status'=>'success','message'=>'Client updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $client = Clients::where('client_id', $id)->first();
        $client->delete();
        return redirect()->route('clients.index')->with([200, 'response', 'status'=>'success','message'=>'Client deleted successfully.']);
    }
}
