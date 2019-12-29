<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show()
    {
        Return response()->download( storage_path('app/public/images/GraceHopper.pdf'),'GraceHopper');
    }

    public function create(Request $request)
    {
        $part = $request->file('photo')->store('testing');
        return response()->json(['part' => $part],200);
    }
}
