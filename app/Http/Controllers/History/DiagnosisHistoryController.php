<?php

namespace App\Http\Controllers\History;

use Illuminate\Http\Request;
use App\Models\DiagnosisHistory;
use App\Http\Controllers\Controller;

class DiagnosisHistoryController extends Controller {
    function userDiagnosisHistory($user_id) {
        $data = DiagnosisHistory::where('user_id', $user_id)->get();
        return view('history.diagnosis.user-diagnosis-history', ['diagnosis_history' => $data]);
    }
    
    function anonymousDiagnosisHistory($anonymous_id) {
        $data = DiagnosisHistory::where('anonymous_id', $anonymous_id)->get();
        return view('history.diagnosis.anonymous-diagnosis-history', ['diagnosis_history' => $data]);
    }
}