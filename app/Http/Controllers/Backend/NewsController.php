<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Backend\News;
use App\Models\Backend\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('backend.news.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = [
            'news_title' => $request->name,
            'news_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'news_url' => $request->url,
        ];
        News::save($data);
        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        if($request->ajax()){
            $data = News::select('news_id','news_title')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('news_title', function($row){
                    return $row->news_title;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('news.edit', $row->news_id).'" class="btn btn-outline-secondary btn-sm py-0 px-1 me-1"><i class="fa-light fa-edit"></i></a><a href="'.route('news.delete', $row->news_id).'" class="btn btn-outline-danger btn-sm py-0 px-1 me-1"><i class="fa-light fa-trash"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'status'])
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
        $news = News::select('news.*', 'media_name')
            ->leftJoin('media', 'media.media_id', 'news.media_id')
            ->where('news_id', $id)
            ->first();
        return view('backend.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $data = [
            'news_title' => $request->name,
            'news_slug' => $request->slug,
            'media_id' => $request->media_id,
            'img_alt' => $request->img_alt,
            'news_url' => $request->url,
        ];
        News::where('news_id', $id)->update($data);
        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        News::where('news_id', $id)->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
