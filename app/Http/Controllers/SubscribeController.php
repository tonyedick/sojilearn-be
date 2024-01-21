<?php

namespace App\Http\Controllers;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        try {
            $result = DB::table('subscribers')->insert([
                'email' => $request->email,
                'created_at' => now(),
            ]);

            if ($result) {
                return redirect('/')->with('success', 'Subscribed Successfully');
            } else {
                return redirect('/')->with('error', 'An unexpected error occurred, please try again');
            }
        } catch (\Exception $e) {
            \Log::error($e);

            return redirect('/')->with('error', 'An unexpected error occurred');
        }
    }
}
