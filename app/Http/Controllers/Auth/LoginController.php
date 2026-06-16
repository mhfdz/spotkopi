<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Diperlukan untuk proses logout

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Dialihkan langsung ke halaman utama setelah login sukses
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Kodingan Tambahan: Dipanggil otomatis oleh Laravel tepat setelah user logout
     */
    protected function loggedOut(Request $request)
    {
        // Memaksa halaman berpindah ke form login setelah logout sukses
        return redirect('/login');
    }
}