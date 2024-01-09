<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs(Request $request)
    {
        try {
            $result = ContactUs::insert([
                'name' => $request->name,
                'email' => $request->email,
                'company' => $request->company,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);

            if ($result) {
                return response()->json(['message' => 'Form data received successfully'], 200);
            } else {
                return response()->json(['message' => 'Something went wrong, please try again'], 400);
            }
        } catch (\Exception $e) {
            \Log::error($e);

            return response()->json(['message' => 'An unexpected error occurred'], 500);
        }
    }
}
