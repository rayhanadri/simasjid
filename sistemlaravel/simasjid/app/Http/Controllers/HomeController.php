<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    private $_client;

    function __construct()
    {
        $this->_client = new Client(['base_uri' => 'http://localhost/RESTful-server-simasjid/anggota.simasjid/public/api/v1/']);
    }
    
    public function index(Request $request)
    {
        //cek token session, jika tidak ada redirect login
        if ($request->session()->has('token')) {
            $token = $request->session()->get('token');
        } else {
            $token = 'Tidak ada data dalam session.';
            return redirect('login');
        }

        //header http request
        $headers = [
            'Authorization' => 'Bearer ' . $request->session()->get('token'),        
            'Accept'        => 'application/json',
        ];
        //ambil response
        $response = $this->_client->request('GET', 'profile', [
            'headers' => $headers,
            'http_errors' => false,
        ]);
        //Parse json ke array
        $result = json_decode($response->getBody(), true);

        // return view('homePage')->with('token', $token)->with('result'->$result);
        return view('homePage', ['token' => $token, 'result'=>$result ]);
    }
}
