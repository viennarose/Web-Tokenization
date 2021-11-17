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

class UsersController extends Controller {

    public $successStatus = 200;

    public function rentalsQuery() {
        $rentals = Rentals::all();

        if (count($rentals) > 0) {
            return response()->json($rentals, $this->successStatus);
        } else {
            return response()->json(['Error' => 'There is no registrations in the database'], 404);
        }
    }
    public function login(){
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] = Str::random(32);
            $success['id'] = $user->id;
            $success['username'] = $user->username;
            $success['email'] = $user->email;
            //$success['token'] =$user->createToken('viennagwapa')->accessToken;
            
            $logs = new Logs();
            $logs->userid = $user->id;
            $logs->log = "Login";
            $logs->logdetails = "User $user->name has logged in to my system";
            $logs->logtype = "API login";
            $logs->save();
            $user->remember_token = $success['token'];
            $user->save();
            return response()->json($success, $this->successStatus);

        }else {
            return response()->json(['response' => 'User not found'], 404);
        }
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => "required",
            'username' => "required",
            'email' => "required|email",
            'password' => "required",
        ]);

        if ($validator->fails()){
            return response()->json(['response' => $validator->errors()], 401);
        }else{
            $input = $request->all();
            
            if(User::where('email', $input['email'])->exists()){
                return response()->json(['response' => 'Email already exist'], 401);
            }elseif(User::where('username', $input['username'])->exists()){
                return response()->json(['response' => 'Username already exist'], 401);

            }else{    
                $input['password'] = bcrypt($input['password']);
                $user = User::create($input);

                $success['token'] = Str::random(64);
                $success['username'] = $user->username;
                $success['id'] = $user->id;
                $sucess['name'] = $user->name;

                return response()->json($success, $this->successStatus);
            }
        }
    }
    public function resetPassword(Request $request) {
        $user = User::where('email', $request['email'])->first();

        if ($user != null) {
            $user->password = bcrypt($request['password']);
            $user->save();

            return response()->json(['response' => 'User has successfully resetted his/her password'], $this->successStatus);
        } else {
            return response()->json(['response' => 'User not found'], 404);
        }
    }
}
?>