<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function show()
    {
        return view('newsletter');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        Newsletter::create([
            'email' => $request->input('email'),
        ]);

        return redirect()->back()->with('success', 'Merci pour votre abonnement !');
    }
}