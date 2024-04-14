<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posts;

class Tags extends Model
{
    protected $fillable = ['name','slug'];

    public function posts(){
    	return $this->belongsToMany(Posts::class);
    }
}
