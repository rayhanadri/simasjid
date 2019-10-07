<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    //variable client adalah client guzzle
    private $_client;

    //constructor untuk instansiasi client guzzle
    function __construct()
    {
        $this->_client = new Client(['base_uri' => 'http://localhost/RESTful-server-simasjid/anggota.simasjid/public/api/v1/']);
    }

    //login checker
    public function login(Request $request)
    {
        if ($request->session()->has('token')) {
            return redirect('/');
        }
        return view('loginPage');
    }

    //auth login, request hasil json username dan password
    public function auth(Request $request)
    {
        if ($request->session()->has('token')) {
            return redirect('/');
        }
        //ambil response dari server login
        $response = $this->_client->request('POST', 'login', [
            'form_params' => [
                'username' => $request->username,
                'password' => $request->password
            ],
            'http_errors' => false
        ]);

        //jika error 404 not found
        if ($response->getStatusCode() == "404") {
            echo "Kombinasi username dan password tidak cocok.";
        //login sukses, access token berhasil dibuat, simpan token dalam session
        } else if ($response->getStatusCode() == "201") {
            $result = json_decode($response->getBody(), true);
            $authtoken = $result['token'];
            $request->session()->put('token', $authtoken);
            // echo "login sukses token: $authtoken";
            return redirect('/');
        } else {
            //terjadi respon server diluar kode 404 dan 201
            echo "Terjadi kesalahan server.";
        }
    }

    public function logout(Request $request)
    {
        //header http request
        $headers = [
            'Authorization' => 'Bearer ' . $request->session()->get('token'),
            'Accept'        => 'application/json',
        ];
        //ambil response
        $response = $this->_client->request('POST', 'logout', [
            'headers' => $headers,
            'http_errors' => false,
        ]);
        //logout gagal kembalikan ke root /
        if ($response->getStatusCode() == "500") {
            return redirect('/');
        //logout sukses, return code 200
        } else if ($response->getStatusCode() == "200") {
            $request->session()->forget('token');
            return redirect('login');
        }
        return redirect('login');
    }

    // menampilkan isi session
    public function tampilkanSession(Request $request)
    {
        if ($request->session()->has('token')) {
            echo $request->session()->get('token');
        } else {
            echo 'Tidak ada data dalam session.';
        }
    }
    // membuat session
    public function buatSession(Request $request)
    {
        $request->session()->put('nama', 'qwerty');
        echo "Data telah ditambahkan ke session.";
    }
    // menghapus session
    public function hapusSession(Request $request)
    {
        $request->session()->forget('token');
        echo "Data telah dihapus.";
    }
}
