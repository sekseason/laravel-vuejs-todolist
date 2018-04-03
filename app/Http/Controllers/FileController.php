<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(Request $request, $type, $id, $name) {
        $file = $type . '/' . $id . '/' . $name;

        if (Storage::disk('local')->exists($file)) {
            $path = Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix($file);
            
            return response()->download($path);
        }

        abort(404);
    }
}
