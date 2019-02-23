<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'name',
        'description',
        'color'
    ];

    public function getAll()
    {
        return static::all();
    }

    public function findCategorie($id)
    {
        return static::find($id);
    }

    public function deleteCategorie($id)
    {
        return static::find($id)->delete();
    }

    public function project() {
		return $this->belongsTo('App\Project');
	}
}
