<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tags;
use App\User;

class Posts extends Model
{
	use SoftDeletes;

	protected $fillable = ['judul','category_id','content','gambar','slug','users_id'];

    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function tags(){
    	return $this->belongsToMany(Tags::class);
    }

    public function users(){
    	return $this->belongsTo(User::class);
    }
}
