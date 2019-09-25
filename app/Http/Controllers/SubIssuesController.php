<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Issue;
use App\SubIssue;
use Illuminate\Http\Request;

class SubIssuesController extends Controller
{
    public function store(Request $request) {
        $subissueDescription = $request['subissue'];
        $issueId = $request['issue_id'];
        $issue = Issue::find($issueId);
        if(!empty($issue)) {
            $subissue = new SubIssue();
            $subissue->description = $subissueDescription;
            $subissue->issue()->associate($issue);
            $subissue->save();
            if($request->ajax()){
                return response()->json($subissue);
            }
            return 'error: non json requests not allowed';
        }
        return 'error: issue not found';
    }

}