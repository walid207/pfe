<?php

namespace App\Http\Controllers;
use app\Models\apprenant;
use app\Models\enseignant;
use app\Models\cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function registerApprenant(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
    }

    $apprenant = new apprenant;
    $apprenant->nom = $request->nom;
    $apprenant->email = $request->email;
    $apprenant->mot_de_passe = Hash::make($request->password);
    $apprenant->save();

    Auth::login($apprenant);

    return redirect('/home');
}
public function registerEnseignant(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|confirmed|max:255',
        'specialite' => 'required|max:255',
    ]);

    $enseignant = new enseignant;
    $enseignant->name = $validatedData['name'];
    $enseignant->email = $validatedData['email'];
    $enseignant->password = bcrypt($validatedData['password']);
    $enseignant->role = 'enseignant'; // ajouter le rôle enseignant
    $enseignant->save();

    $enseignant = new Enseignant; // créer une instance de l'enseignant
    $enseignant->user_id = $enseignant->id;
    $enseignant->specialite = $validatedData['specialite'];
    $enseignant->save();

    Auth::login($enseignant);

    return redirect('/dashboard');
}

public function registerCours(Request $request)
{
    $validatedData = $request->validate([
        'titre' => 'required|max:255',
        'description' => 'required',
        'enseignant_id' => 'required|exists:enseignants,id',
    ]);

    $cours = new Cours;
    $cours->titre = $validatedData['titre'];
    $cours->description = $validatedData['description'];
    $cours->enseignant_id = $validatedData['enseignant_id'];
    $cours->save();

    return redirect('/dashboard');
}
    public function gerer_session(){

    }
    public function gerer_inscription(){
        
    }
}
