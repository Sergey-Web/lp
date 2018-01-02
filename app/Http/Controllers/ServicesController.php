<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Helpers;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Service::all();
        $nameSection = Helpers::getPageName(request()->path());
        if(count($pages) == 0) {
            return 'empty';
        }
        $dataPages = $pages->first()->toArray();
        $titleColumns = Helpers::delKeysFromArray($dataPages, ['id', 'name', 'created_at', 'updated_at']);
        foreach($pages->toArray() as $page) {
            $sections[] = Helpers::delKeysFromArray($page, ['name', 'created_at', 'updated_at']);
        }

        return view('admin.single-section', [
            'titleColumns' => $titleColumns,
            'sections'     => $sections,
            'nameSection'  => $nameSection
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::destroy($id);
        return redirect()->back();
    }
}
