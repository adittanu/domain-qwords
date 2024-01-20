<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // delete semua session
        // session()->flush();
        return view('welcome');
    }

    public function konfigurasi()
    {
        return view('konfigurasi');
    }

    public function invoice(Request $request)
    {
        // set session login
        session(['login' => 'true']);
        // set session nama, email, password dari params
        session(['nama' => $request->input('nama')]);
        session(['email' => $request->input('email')]);
        session(['password' => $request->input('password')]);
        // ambil dari select paket
        session(['paket' => $request->input('paket')]);

        return view('invoice');
    }

    // get whois online
    public function getWhoisOnline(Request $request)
    {
        // get domain from request
        $domain = $request->input('domain');
        // get whois online
        // https://portal.qwords.com/apitest/whois.php?domain=testing123.com
        $url = "https://portal.qwords.com/apitest/whois.php?domain=". $domain;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        // return whois online
        // dd($output);
        return $output;
    }

    // get login
    public function getLogin(Request $request)
    {
        // get data login di session
        $login = session('login');
        // jika ada maka true jika tidak false
        if ($login == null) {
            $login = false;
        }
        return $login;
    }

}
