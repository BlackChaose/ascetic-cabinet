<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
//use GuzzleHttp;
//FIXME - разобраться с парсингом! авторизацией на сторонних ресурсах!

class ShowTeams extends Controller
{
	//~ private $username = 'nikita.s.kalitin@gmail.com';
	//~ private $password = 'Saturn33!';
	//~ private $additionalHeaders="";
	//private $url= 'https://xn--b1aaqfxbbhefb3bya5f.xn--p1ai/hackathon/users/';
	/* https://цифровойпрорыв.рф/hackathon/users/   */
	//private $url = 'http://httpbin.org/cookies';
	private $url= 'http://kalitinns.mno.extech.ru/admin/login';
	private $tst_url = 'http://kalitinns.mno.extech.ru/admin/organizations';
	
    
    private function parseCP(){
		$client = new \GuzzleHttp\Client(['cookies' => true]);
		$jar = new \GuzzleHttp\Cookie\CookieJar;
		
		$response = $client->request('GET', $this->url,['cookies'=>$jar]);
		
		$token=$response->getHeaders()["Set-Cookie"][0];
		
		//~ $response2 = $client->post($this->url,['headers'=>['X-CSRF-TOKEN'=>$token]],['form_params' => [
        //~ '_token' => $token,
        //~ 'email' => 'nikita.s.kalitin@gmail.com',
        //~ 'password' => '6quedd0v']
        //~ ]);

		//$response = $client->request('GET', $this->tst_url,['cookies'=>$jar]);
			
		return $response;
	}
	public function showTeams(){
		$res = $this->parseCP();
		if(!empty($res)){
		print$this->parseCP()->getBody();
		}
		else{
			print_r(json_encode(["stats"=>"empty request"]));
			}
		}
}
