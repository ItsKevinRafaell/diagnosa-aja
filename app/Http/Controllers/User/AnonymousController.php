<?php

namespace App\Http\Controllers\User;

use App\Models\Anonymous;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnonymousValidationRequest;
use Illuminate\Auth\Events\Validated;

class AnonymousController extends Controller {
    function createAnonymous(AnonymousValidationRequest $request) {
        $anonymous = Anonymous::create([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'gender' => $request->input('gender'),
            'blood_type' => $request->input('blood_type'),
        ]);
        $anonymous->save();
        return response()->json(['message' => 'Data Diri Berhasil Di Simpan!', 'data' => $anonymous], 200);
    }
}
