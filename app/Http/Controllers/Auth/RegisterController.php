<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function index(Request $request)
    {
        $keyword = $request->get("search");
        $perPage = 25;
        if (!empty($keyword)) {
        } else {
            $user = User::paginate($perPage);
        }
        return view("auth.index", compact("user"));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            // 'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        // dd($user->job_description_wages);
        return view('auth.edit', compact(
            "user",
        ));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'last_name' => ['required', 'string', 'max:255'],

            'user_id' => ['required', 'string', 'max:10', Rule::unique('users')->ignore($id)],
        ]);
        $requestData = $request->all();
        $requestWageData["wage"] = $requestData["wage"];
        unset($requestData["wage"]);
        $user = User::findOrFail($id);
        $user->update($requestData);


        return redirect($this->redirectPath())->with("flash_message", "データが更新されました。");
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect($this->redirectPath())->with("flash_message", "データが削除されました。");
    }



    // ログイン後のリダイレクト先を記述
    public function redirectPath()
    {
        return "/";
    }
}
