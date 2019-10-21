<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Issue;
use App\SubIssue;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubissuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "index not implemented";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "create not implemented";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subissueDescription = $request['subissue'];
        $issueId = $request['issue_id'];
        $issue = Issue::find($issueId);
        if (!empty($issue)) {
            $subissue = new SubIssue();
            $subissue->description = $subissueDescription;
            $subissue->issue()->associate($issue);
            $subissue->save();
            if ($request->ajax()) {
                return response()->json($subissue);
            }
            return 'error: non json requests not allowed';
        }
        return 'error: issue not found';    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show not implemented";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit not implemented";
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
        return "update not implemented";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Log::info('Attempting to destroy the subissue with the id: ' . $id);
        $result = SubIssue::destroy($id);
        return $result;
    }
}
