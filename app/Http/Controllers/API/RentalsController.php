<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Rentals;
use App\Repositories\rentalsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Logs;
use Flash;
use Response;

class RentalsController extends Controller {
    public $successStatus = 200;

    public function getAllrentals(Request $request) {
        $token = $request['t']; // t=token
        $userid = $request['u']; //u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $rentals = rentals::all();

            return response()->json($rentals, $this->successStatus);
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
    }
    
    public function getRentals(Request $request) {
        $id = $request['pid']; // pid = rentals id
        $token = $request['t']; // t= token
        $userid = $request['u']; //u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $rentals = rentals::where('id', $id)->first();

            if($rentals != null) {
                return response()->json($rentals, $this->successStatus);
            } else {
                return response()->json(['response' => 'Rentals not found!'], 404);
            }
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
    }

    public function searchRentals(Request $request) {
        $params = $request['p']; // p = params
        $token = $request['t']; // t=token
        $userid = $request['u']; //u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $rentals = rentals::where('CarType', 'LIKE', '%' . $params . '%')
                ->orWhere('Address',  'LIKE', '%' . $params . '%')
                ->get();
            // SELECT = FROM rentals WHERE log LIKE '%params%' OR logdetails LIKE '%PARAMS%'
            if($rentals != null) {
               return response()->json($rentals, $this->successStatus);
            } else {
                return response()->json(['response' => 'Rentals not found!'], 404);
            }
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
    }
}