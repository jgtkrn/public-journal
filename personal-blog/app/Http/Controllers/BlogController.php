<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Tags;
use App\Category;

class BlogController extends Controller
{
    public function index(Posts $posts, Tags $tags){
        $category_widget = Category::all();
        $exclude_tags = array('Satu', 'Dua', 'Tiga', 'Empat');

    	$data = $posts->latest()->paginate(10);
        $satu = $posts->whereHas('tags', function($query) {
            $query->where('name', 'Satu');
        })->latest()->take(1)->get();
        $dua = $posts->whereHas('tags', function($query) {
            $query->where('name', 'Dua');
        })->latest()->take(1)->get();
        $tiga = $posts->whereHas('tags', function($query) {
            $query->where('name', 'Tiga');
        })->latest()->take(1)->get();
        $empat = $posts->whereHas('tags', function($query) {
            $query->where('name', 'Empat');
        })->latest()->take(1)->get();
        $populer = $posts->whereHas('tags', function($query) {
            $query->where('name', 'Populer');
        })->latest()->take(3)->get();

        $tags = $tags->latest()->get();

    	return view('blog', compact('data', 'populer', 'satu', 'dua', 'tiga', 'empat', 'category_widget', 'tags', 'exclude_tags'));
    }

    public function isi_blog(Posts $posts, Tags $tags, $slug){
        $category_widget = Category::all();
        $exclude_tags = array('Satu', 'Dua', 'Tiga', 'Empat');
        $populer = $posts->whereHas('tags', function($query) {
            $query->where('name', 'Populer');
        })->latest()->take(3)->get();
    	$data = Posts::where('slug', $slug)->get();
        $tags = $tags->latest()->get();
    	return view('blog.isi_post', compact('data', 'populer', 'tags', 'category_widget', 'exclude_tags'));
    }

    public function list_blog(Posts $posts, Tags $tags){
        $category_widget = Category::all();
        $exclude_tags = array('Satu', 'Dua', 'Tiga', 'Empat');
        $populer = $posts->whereHas('tags', function($query) {
            $query->where('name', 'Populer');
        })->latest()->take(3)->get();
    	$data = Posts::latest()->paginate(6);
        $tags = $tags->latest()->get();
    	return view('blog.list_post', compact('data', 'populer', 'tags', 'category_widget', 'exclude_tags'));
    }

    public function list_category(Posts $posts, Tags $tags, category $category){
        $category_widget = Category::all();
        $exclude_tags = array('Satu', 'Dua', 'Tiga', 'Empat');
        $populer = $posts->whereHas('tags', function($query) {
            $query->where('name', 'Populer');
        })->latest()->take(3)->get();

        $tags = $tags->latest()->get();

        $data = $category->posts()->paginate(6);
        return view('blog.list_post', compact('data', 'populer', 'tags', 'category_widget', 'exclude_tags'));
    }

    public function cari(Posts $posts, Tags $tags, request $request){
        $category_widget = Category::all();
        $exclude_tags = array('Satu', 'Dua', 'Tiga', 'Empat');
        $populer = $posts->whereHas('tags', function($query) {
            $query->where('name', 'Populer');
        })->latest()->take(3)->get();
        $data = Posts::where('judul', $request->cari)->orWhere('judul','like','%'.$request->cari.'%')->paginate(6);
        $tags = $tags->latest()->get();
        return view('blog.list_post', compact('data','populer', 'tags', 'category_widget', 'exclude_tags'));
    }
}
