<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posts;

class Category extends Model
{
	protected $fillable = ['name','slug'];
	
    protected $table = 'category';

    public function posts(){
    	return $this->hasMany(Posts::class);
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
