<?php

namespace App\Http\Controllers;
use App\Models\Subscriber;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        try {
            $result = Subscriber::insert([
                'email' => $request->email,
            ]);

            if ($result) {
                return response()->json(['message' => 'Successfully subscribed'], 200);
            } else {
                return response()->json(['message' => 'Something went wrong, please try again'], 400);
            }
        } catch (\Exception $e) {
            \Log::error($e);

            return response()->json(['message' => 'An unexpected error occurred'], 500);
        }
    }
}
