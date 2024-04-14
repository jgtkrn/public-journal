<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{

    public function store(Request $request)
    {
        $gambar = $request->upload;
        $new_gambar = time().$gambar->getClientOriginalName();
        return response()->json([
            'url' => url('public/public/uploads/posts/'.$new_gambar),
        ]);
    }
}
