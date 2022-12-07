<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository;
use App\Utilities\AppHelper;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function loginPage(){
        if (Auth::user() != null){
            return redirect()->route('dashboard');
        } else{
            return view('auth.login');
        }
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function loginInUser(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = $this->userRepository->getUserByEmail($request->email);
            if (!Auth::attempt($request->only('email','password')) || $user->status != 1){
                return AppHelper::errorRedirect('Invalid login attempt!');
            }
            return AppHelper::successRedirect('Successfully logged in!','dashboard');
        } catch (\Exception $e) {
            return AppHelper::errorRedirect(null,$e);
        }
        
        // $input = $request->all();

        // if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        // {
        //     if (auth()->user()->status == 1)
        //     {
        //             return redirect()->route('dashboard');
        //     }
        // }
        // else
        // {
        //     return redirect()->route('login')
        //         ->with('error','UserName And Password Are Wrong.');
        // }
    }

    /**
     * @return RedirectResponse
     */
    public function logOutUser(): \Illuminate\Http\RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login');
    }

}
