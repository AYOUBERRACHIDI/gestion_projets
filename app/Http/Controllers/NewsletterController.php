<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    // Afficher le formulaire (optionnel)
    public function show()
    {
        return view('newsletter');
    }

    // Traiter la soumission du formulaire
    public function store(Request $request)
    {
        // Valider les données
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);

        // Si la validation échoue, retourner une erreur
        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        // Enregistrer l'email dans la base de données
        Newsletter::create([
            'email' => $request->input('email'),
        ]);

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Merci pour votre abonnement !');
    }
}