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
                return redirect('/')->with('success','Subscribed Sucessfully');
            } else {
                return redirect('/')->with('error','An unexpected error occured, please try again');
            }
        } catch (\Exception $e) {
            \Log::error($e);

            return redirect('/')->with('error','An unexpected error occurred');
        }
    }
}
