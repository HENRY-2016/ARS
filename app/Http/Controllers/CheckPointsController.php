<?php

namespace App\Http\Controllers;

use App\Models\CheckPointsModel;
use Illuminate\Http\Request;

class CheckPointsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CheckPointsModel::latest()->get ();
        return view('components.check-Points', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate ([
            'Name' => 'required',
        ]);

    
        // insert Data
        $form_data = array(
            'Name' => $request->Name,
        );
        CheckPointsModel::create ($form_data);
        return redirect('CheckPointsResource')
            ->with('success','Data Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = CheckPointsModel::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rowId = $request->editId;

        $request -> validate ([
            'Name' => 'required',
        ]);

        // Update Data
        $form_data = array(
            'Name' => $request->Name,
        );
        // update
        CheckPointsModel::whereId ($rowId)->update($form_data);
        return redirect('CheckPointsResource')
            ->with('success','Data Is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $rowId = $request->deleteId;

        // delete
        $data = CheckPointsModel::findOrFail($rowId);
        $data ->delete();
        return redirect('CheckPointsResource')
            ->with('success','Data Is Successfully Deleted');
    }
}
