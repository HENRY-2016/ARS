<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Models\RosterModel;
use Illuminate\Http\Request;

class RosterController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RosterModel::latest()->get ();
        return view('components.roster', compact('data'));
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
        $time = GeneralHelper::getCurrentTime();
        $signIn = $request->input('signIn');
        $signOut = $request->input('signOut');

        $request -> validate ([
            'Name' => 'required',
        ]);

    
        if (!empty($signIn))
        {
            // insert Data
            $form_data = array(
                'name' => $request->Name,
                'signIn'=>$time,
                'signOut'=>'Null', 
                'checkPoint'=>'Null',
                'status'=>'Pending',
            );
            RosterModel::create ($form_data);
            return redirect('RosterResource')
                ->with('success','Have Signed In Successfully.');
        }
        if (!empty($signOut))
        {
            $rowId = $request->rowId;
            $form_data = array(
                'signOut'=>$time, 
            );
            RosterModel::whereId ($rowId)->update($form_data);
            return redirect('RosterResource')
                ->with('success','Have Signed Out Successfully');
            }
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
        $data = RosterModel::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rowId = $request->approveId;
        $time = GeneralHelper::getCurrentTime();
        $request -> validate ([
            'checkPoint' => 'required',
        ]);

        // Update Data
        $form_data = array(
            'checkPoint'=>$request->checkPoint,
            'status'=>'Approved',
        );
        // update
        RosterModel::whereId ($rowId)->update($form_data);
        return redirect('RosterResource')
            ->with('success','Data Is Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $rowId = $request->deleteId;

        // delete
        $data = RosterModel::findOrFail($rowId);
        $data ->delete();
        return redirect('RosterResource')
            ->with('success','Data Is Successfully Deleted');
    }
}
