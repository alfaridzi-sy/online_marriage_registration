<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OtpCode;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Mengambil data pengguna yang berhasil diautentikasi
            $user = Auth::user();

            // Menghasilkan OTP
            $otp = rand(100000, 999999);
            $expiresAt = now()->addMinutes(5); // OTP berlaku selama 5 menit

            // Simpan OTP ke tabel otp
            DB::table('otp_codes')->insert([
                'user_id' => $user->id,
                'otp_code' => $otp,
                'expires_at' => $expiresAt,
            ]);

            // Kirim OTP melalui Email
            $this->sendOtp($user, $otp);

            return redirect()->route('otp.verify'); // Arahkan pengguna ke halaman verifikasi OTP
        }

        return back()->with('loginError', 'Login Gagal!');
    }

    public function sendOtp($user, $otp)
    {
        // Kirim OTP melalui email
        Mail::to($user->email)->send(new \App\Mail\SendOtpMail($otp));
    }

    public function showVerifyOtpForm()
    {
        return view('otp.verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp_code' => ['required', 'numeric', 'digits:6'],
        ]);

        $otpRecord = DB::table('otp')
            ->where('otp_code', $request->otp_code)
            ->where('is_used', false)
            ->where('expires_at', '>', now())
            ->first();

        if ($otpRecord) {
            // Tandai OTP sebagai telah digunakan
            DB::table('otp')
                ->where('id', $otpRecord->id)
                ->update(['is_used' => true]);

            // Lanjutkan proses login dan arahkan pengguna ke halaman yang sesuai berdasarkan peran mereka
            $user = Auth::user();
            if ($user->role === 'jemaat') {
                return redirect()->intended('/');
            } elseif ($user->role === 'ketua_stasi') {
                return redirect()->intended('/ketua_stasi/data-jemaat');
            } else {
                return back()->with('loginError', 'Role pengguna tidak valid!');
            }
        } else {
            return back()->with('loginError', 'Kode OTP tidak valid atau telah kedaluwarsa!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
