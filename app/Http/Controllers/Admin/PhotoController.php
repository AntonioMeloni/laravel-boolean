<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request) {

        $data = $request->all();
        $path = Storage::disk('public')->put('images', $data['path']);
        dd($path);

    }

    public function update(Request $request, $id) {
        $photo =[
            'id'=> 1,
            'title'=> 'Titolo',
            'description'=> 'Questa è una descrizione',
            'path'=> 'images/r9yXBzOCUiABUEOalUWBvD349EHqL65a4eStoBy6.jpeg'
        ];

        $data = $request->all();
        if (isset($data['path'])) {
            Storage::disk('public')->delete($photo['path']);
        }

    }
}
