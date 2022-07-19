<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Journal;

class journalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $journal = Journal::all();
        return view('index', compact('journal'));
        
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
        $storeData = $request->validate([
            'data' => 'required | max:225',
            'date' => 'required | max:225',
            'type' => 'required | max:255',
        ]);

        $journal = Journal::create($storeData);
        return redirect('/journals')->with('success', 'Journal saved');
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
        $journal = Journal::findOrFail($id);
        return view('/edit', compact('journal'));
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
        $storeData = $request->validate([
            'data' => 'required | max:225',
            'date' => 'required | max:225',
            'type' => 'required | max:255',
        ]);
        $journal = Journal::whereId($id)->update($storeData);
        return redirect('/journals')->with('success', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $journal = Journal::whereId($id)->delete($id);
        return redirect('/journals')->with('success', 'Deleted');
    }
}
