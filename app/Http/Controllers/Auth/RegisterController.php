<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only('name', 'email', 'password');

         $user = User::create($data);

        alert()->info('Bilgilendirme','Lütfen mailinize gelen onay butonuna tıklayınız.');

        return redirect()->back();

    }

    public function verify(Request $request)
    {
        $userID = Cache::get('verify_token_' . $request->token);

        if (!$userID) {
            alert()->warning('Uyarı','Tokenin geçerlilik süresi bitti.');
            return redirect()->route('register');
        }

//        $user = User::findOrFail($userID);
//        $user->email_verified_at = now();
//        $user->save();
        $userQuery = User::query()
            ->where('id', $userID);

        $user = $userQuery->firstOrFail();

        $userQuery->update(['email_verified_at' => now()]);


//        Cache::forget('verify_token_' . $request->token);

        Auth::login($user);
        alert()->success('Başarılı','Hesabınız onaylandı!');
        return redirect()->route('admin.index');

    }
}
