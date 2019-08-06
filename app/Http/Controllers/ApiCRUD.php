<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class ApiCRUD extends Controller
{
		private function parseData($str){


		}
		public function show_quiz(Request $req){
			if(!empty($req['userData'])){
			$userData = $req->userData;
			$userArr = explode(" ", $userData);
			//dd($userArr);
			$specToken = hash('md5',$userData);

			try{
			$chk= DB::table('records')->select('uniq_hash')->where('uniq_hash',$req['_specToken'])->get()->toArray();
			}catch(QueryException $e){
				report($e);
				return view('stat',['userData'=>null,'message'=>"Вы уже оставляли отзыв по этому талону ранее!"]);
			}

			if(!empty($chk) && $chk[0]->uniq_hash == $specToken){
				// return response()->json(['res' => 'вы уже оставили свой отзыв ранее!'],200);
				return  view('stat',['message'=>"Вы уже оставляли отзыв по этому талону ранее!"]);
			}

			$arrToRec = [
				'ticket_num' =>$userArr[2],
				'name_org' => $userArr[3].' '.$userArr[4].' '.$userArr[5].' '.$userArr[6].' '.$userArr[7].' '.$userArr[8].' '.$userArr[9].' '.$userArr[10],
				'data_visit' => $userArr[11].' '.$userArr[12].' '.$userArr[13].' '.$userArr[14].' '.$userArr[15],
				'doctor_spec' => $userArr[16],
				'doctor_name' => $userArr[17].' '.$userArr[18].' '.$userArr[19],
				'cab_num' => $userArr[20],
				'raw_message' => $userData,
				'uniq_hash' => $specToken,
			];

			try{
			 DB::table('records')->insert($arrToRec);	
			}catch(QueryException $e){
				report($e);
				return view('stat',['message'=>"Вы уже оставляли отзыв по этому талону ранее!"]);
			}
		}

			return view('quiz',['userData'=>$userData, 'specToken'=>$specToken]);
			}
		
		public function show_stat(){
			return view('stat');
		}
			
		public function get_all_records(Request $req, $type){
			// dd($req->searchtpl, $req);
			
			if(!empty($req->searchtpl) && $type == 'org'){
					try{
					$strLike = 'name_org like ?';
					$res = DB::table('records')->select('name_org')->whereRaw($strLike,['%'.$req->searchtpl.'%'])->distinct()->get();	
					}catch(QueryException $e){
						return response()->json(['error'=>$e]); 
					}
			}
			if(!empty($req->searchtpl) && $type == 'doctor'){
				try{
				$strLike = 'doctor_name like ?';
				$res = DB::table('records')->select('doctor_name', 'doctor_spec', 'name_org')->whereRaw($strLike,['%'.$req->searchtpl.'%'])->distinct('doctor_name')->get()->toArray();	
				}catch(QueryException $e){
					return response()->json(['error'=>$e]); 
				}
			}
			// if(!empty($req) && !empty($req['org'])){
			// 	//$marker = $req['org'];
			// 	try{
			// 		$res = DB::table('records')->select('name_org')->distinct()->get();	
			// 		}catch(QueryException $e){
			// 			return response()->json(['error'=>'$e->message']); 
			// 		}
			// }else if(!empty($req) && !empty($req['fio'])){
			// 	//$marker = $req['fio'];
			// 	try{
			// 		$res = DB::table('records')->select('doctor_name')->distinct()->get();	
			// 		}catch(QueryException $e){
			// 			return response()->json(['error'=>'$e->message']); 
			// 		}
			// }

			

            return response()->json(['search'=>$res]);					
			}
			
		public function set_record(Request $req){
			if(!empty($req)){
				$chk= DB::table('records')->select('block')->where('uniq_hash',$req['_specToken'])->get()->toArray();	
				//comment for debug
				if($chk[0]->block == 1){
					//return response()->json(['res' => ''],200);
					return  view('stat',['message'=>"Вы уже оставляли отзыв по этому талону ранее!"]);
				}
				$res = DB::table('records')->where('uniq_hash',$req['_specToken'])->update(
						[
						 'doc_range' => $req['doctor_range'],
						 'clinic_range' => $req['clinic_range'],
						 'comment' => $req['comment'],
						 'block' => 1,
						 ]
					);
				}				

			 //return response()->json(['response'=>$req, 'arr'=>$_POST, 'res'=>$res],200);
			 return  view('stat',['message'=>"Спасибо что оставили свой отзыв"]);
		}
		public function filter_records(Request $rec){
			
				if(!empty($rec['filter']['name_org'])){
					$sql='name_org LIKE %'.$rec['filter']['name_org'].'%';
					$res = DB::table('records')->whereRaw($sql)->get();
					return response()->json(['response'=>$res]);
				}
				return response()->json(['response'=>'null']);			
			}

		public function records_search(Request $rec){
			if(!empty($rec->query('search'))){
				$plh=urlencode($rec->query('search'));
				$sql='name_org LIKE \'%'.$plh.'%\'';
				$res = DB::table('records')->whereRaw($sql)->get();
				return response()->json(['response'=>$res],200);
			}
			return response()->json(['response'=>'not found'],200);
		}
		
}
