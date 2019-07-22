<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
//use GuzzleHttp;


class ShowTeams extends Controller
{
	private $username = 'nikita.s.kalitin@gmail.com';
	private $password = 'Saturn33!';
	private $additionalHeaders="";
	//private $url= 'https://xn--b1aaqfxbbhefb3bya5f.xn--p1ai/lk/';
	private $url = 'http://httpbin.org/cookies';
	private $headers_request="";
    
    private function parseCP(){
		$client = new \GuzzleHttp\Client(['cookies' => true]);
		$jar = new \GuzzleHttp\Cookie\CookieJar;
		
		$response = $client->request('GET',$this->url,["cookies"=>$jar]);
		
		//$response = json_decode($response->getBody(), true);
		return $response;
	}
	public function showTeams(){
		$res = $this->parseCP();
		if(!empty($res)){
		print_r($this->parseCP());
		}
		else{
			print_r(json_encode(["stats"=>"empty request"]));
			}
		}
}
