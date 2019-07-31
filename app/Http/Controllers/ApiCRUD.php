<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiCRUD extends Controller
{
		public function show_MainPage(){
			
			return view('application');
			}
			
		public function get_all_records(){
			$res = DB::table('records')         
                ->get();	
                
            return response()->json(['response'=>$res]);					
			}
			
		public function set_record(Request $req){
				
			if(!empty($req)){
			
				$res = DB::table('records')->insert(
						[
						 'ticket_num' => $req['new_record']['ticket_num'],
						 'name_org'=> $req['new_record']['name_org'],
						 'data_visit' => $req['new_record']['data_visit'],
						 'doctor_name' => $req['new_record']['doctor_name'],
						 'doctor_spec' => $req['new_record']['doctor_spec'],
						 'cab_num' => $req['new_record']['cab_num']
						 ]
					);
				}				
			 return response()->json(['response'=>$res]);
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
				$sql=' name_org LIKE \'%'.$plh.'%\'';
				$res = DB::table('records')->whereRaw($sql)->get();
				return response()->json(['response'=>$res],200);
			}
			return response()->json(['response'=>'not found'],200);
		}
}
