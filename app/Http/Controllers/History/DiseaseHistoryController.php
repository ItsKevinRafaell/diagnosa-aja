<?php

namespace App\Http\Controllers\History;

use Illuminate\Http\Request;
use App\Models\DiseaseHistory;
use App\Http\Controllers\Controller;

class DiseaseHistoryController extends Controller {
    function userDiseaseHistory($user_id) {
        $data = DiseaseHistory::where('user_id', $user_id)->get();
        return view('history.diseases.user-diseases-history', ['diseases_history' => $data]);
    }

    function anonymousDiseaseHistory($anonymous_id) {
        $data = DiseaseHistory::where('anonymous_id', $anonymous_id)->get();
        return view('history.diseases.anonymous-diseases-history', ['diseases_history' => $data]);
    }

    function createDiseaseHistory(Request $request) {
        $user_id = $request->input('user_id');
        $anonymous_id = $request->input('anonymous_id');

        if (!$user_id && !$anonymous_id) {
            return response()->json(['message' => 'Silahkan Isi Data Diri Kembali!']);
        }
    
        if ($user_id && $anonymous_id) {
            $anonymous_id = null;
        }
    
        $diseaseHistories = $request->input('disease_history');
    
        foreach ($diseaseHistories as $diseaseHistory) {
            DiseaseHistory::create([
                'user_id' => $user_id,
                'anonymous_id' => $anonymous_id,
                'disease_history' => $diseaseHistory,
            ]);
        }
        return response()->json(['message' => 'Riwayat Penyakit Berhasil Di Simpan!', 200]);
    }
}
