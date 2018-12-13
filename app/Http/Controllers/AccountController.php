<?php

namespace App\Http\Controllers;

use App\Models\SocialCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\In;
use Illuminate\Validation\Rules\Unique;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        return view('account')->with([
            'page_title' => 'Mon compte',
            'page_description' => 'Gérez votre compte vote-citoyen.fr',
            'user' => $request->user(),
            'form_genders' => User::getGendersList(),
            'form_categories' => SocialCategory::getCached(),
        ]);
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date_format:d/m/Y'],
            'postcode' => ['required', 'regex:/^\d{5}$/i'],
            'social_category_id' => ['required', 'exists:social_categories,id'],
            'gender' => ['required', new In(array_keys(User::getGendersList()))],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $user = $request->user();
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->gender = $request->get('gender');
        $user->postcode = $request->get('postcode');
        $user->social_category_id = $request->get('social_category_id');
        $user->birthdate = $request->get('birthdate');
        $user->save();

        flash()->overlay("Vos informations personnelles ont été enregistrées !");
        return redirect()->route('account.home');
    }

    public function password(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'current_pass' => ['required', 'password'],
            'new_pass' => ['required', 'min:6', 'confirmed'],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $user = $request->user();
        $user->password = $request->get('new_pass');
        $user->save();

        flash()->overlay("Votre adresse mot de passe a été enregistrée !");
        return redirect()->back();
    }

    public function email(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'new_email' => ['bail', 'required', 'confirmed', 'different:current_email', 'email', 'blacklist', 'max:255', (new Unique('users', 'email'))->ignore($request->user()->id)],
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        $user = $request->user();
        $user->email = $request->get('new_email');
        $user->save();

        flash()->overlay("Votre adresse email a été enregistrée !");
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        flash()->overlay("Contactez-nous via le formulaire de contact pour demander la suppression de votre compte.");
        return redirect()->back();
    }
}
