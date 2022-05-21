<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'file_code' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $conf = DB::table('activate_files')->where('Bennar',$request->file_code)->first();
        if (isset($conf)){
            $inputData = [];

            $inputData['name'] = $request->name;
            $inputData['email'] = $request->email;
            $inputData['File_code'] = $request->file_code;
            $inputData['phone'] = $request->phone;
            $inputData['Level'] = 2;
            $inputData['roll'] = 'appUser';
            $inputData['password'] = bcrypt($request->password);
            $user = User::create($inputData);
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['id'] =  $user->id;
            if($user){
                return $this->sendResponse($success, 'تم تسجيل بياناتك بنجاح');
            }else{
                return $this->sendError('خطا في تسجيل البيانات ...حاول مرة اخري.', []);
            }

        }else{
            return $this->sendError('رقم الملف الذي ادخلته غير صحيح', []);
        }

    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $token =  $user->createToken('MyApp')->accessToken;
            $user =  $user;

            return response()->json(
                [
                    'token' => $token,
                    'uid' => $user->id,
                    'uname' => $user->name,
                    'upac' => $user->File_code,
                    'uphone' => $user->phone,
                    'uemail' => $user->email,
                    'message' => '',
                    'success' => true
                ], 200);
        }
        else{
            return $this->sendError('خطأ في اسم المستخدم او كلمة المرور', ['error'=>'Unauthorised']);
        }
    }
}
