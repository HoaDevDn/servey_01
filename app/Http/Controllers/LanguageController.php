<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $locale = $request->get('locale');
            Session::put('locale', $locale);

            return response()->json([
                'success' => true,
                'urlBack' => url()->previous(),
            ]);
        }

        return response()->json([
            'success' => false,
        ]);
    }
}
