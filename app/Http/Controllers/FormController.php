<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\GeminiController;
class FormController extends Controller
{
    public function formSubmit(Request $request)
    {
        $query = $request->input('message');
        $gemini = new GeminiController();
        $response = $gemini->generateText($query);

        return $response;
    }
}
