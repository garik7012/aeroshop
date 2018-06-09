<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * upload images from turmbowyg editor.
     * @param Request $request
     * @return string
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'image|max:2000'
        ]);
        $imgpath = $request->file('image')->store('uploads', 'public');
        return json_encode(['success' => 'success', 'image_url' => asset($imgpath)]);
    }
}
