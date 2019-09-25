<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubIssue extends Model
{
    protected $fillable = [
        'description',
        'done',
        'issue_id'
    ];

    /**
	 * An sub issue belongs to a issue
	 */
	public function issue() {
		return $this->belongsTo('App\Issue');
	}
}
