<?php

namespace App\Http\Controllers\Auth;

use App\Models\SocialCategory;
use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rules\In;

class RegisterController extends Controller
{
    use RegistersUsers;

    /** @var string $redirectTo */
    protected $redirectTo = '/';

    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register')->with([
            'page_title' => 'Inscription',
            'page_description' => "Créer un nouveau compte utilisateur sur Vote Citoyen",
            'form_genders' => User::getGendersList(),
            'form_categories' => SocialCategory::with('subCategories')->isParentCategory()->get(),
        ]);
    }

    /**
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthdate' => ['required', 'date_format:d/m/Y'],
            'postcode' => ['required', 'regex:/^\d{5}$/i'],
            'gender' => ['required', new In(array_keys(User::getGendersList()))],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'cgu' => ['accepted'],
        ]);
    }

    /**
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'gender' => $data['gender'],
            'postcode' => $data['postcode'],
            'social_category_id' => $data['social_category_id'],
            'email' => $data['email'],
            'birthdate' => $data['birthdate'],
            'password' => $data['password'],
        ]);
    }
}
