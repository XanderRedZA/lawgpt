<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GeminiAPI\Client;
use GeminiAPI\Resources\ModelName;
use GeminiAPI\Resources\Parts\TextPart;

class GeminiController extends Controller
{
    protected $response;

    public function generateText($query)
    {
        // Get the input from the form


        $client = new Client(env('GEMINI_API_KEY'));
        try {
            // Get the Gemini API key from the environment variables
            // Initialize the Gemini client using the Laravel facade

            // $promptWithInstruction = new TextPart("You are a highly knowledgeable and experienced South African law expert. When responding to legal questions, you must strictly adhere to South African law, legal principles, statutes, case law, and relevant regulations. Do not provide information or opinions based on the laws of any other jurisdiction. If the question is unclear or requires clarification within the South African legal context, ask clarifying questions before providing an answer. Ensure your responses are accurate, comprehensive, and tailored to the South African legal framework.\n\nUser Question: " . $query);
            $promptWithInstruction = new TextPart($query);

            // Correctly assign the response to the class property
            $this->response = $client
                ->generativeModel(ModelName::GEMINI_1_5_PRO)
                ->generateContent(
                    $promptWithInstruction
                );

            return json_encode($this->response->text());

        } catch (\Exception $e) {
            // Handle any errors that occur during the API call
            return $e->getMessage();
        }
    }

}
