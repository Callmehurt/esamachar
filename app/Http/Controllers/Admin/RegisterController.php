<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewUserRequest;
use App\Repository\NewUserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;


class RegisterController extends Controller
{
    private $newUserRepository;

    public function __construct(NewUserRepository $newUserRepository)
    {
        $this->newUserRepository = $newUserRepository;
    }

    public function index(){
        return view('admin.pages.register');
    }

    public function store(NewUserRequest $request){
        try{
            if(request()->hasFile('avatar')){
                request()->validate([
                    'avatar' => 'required|image|mimes:jpeg,jpg,png|max:5048',
                ]);
            }

            $user = new User();
            if(Request()->hasFile('avatar')) {
                $image = $request->file('avatar');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('Avatar'), $name);
                $path = 'uploads/avatar';
                $user->avatar = $path.'/'.$name;
            }

            $user->name = $request->fullname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $user->attachRole('administrator');
            if($user){
                return response()->json(['status' => true, 'message' => 'Registered Successfully']);
            }else{
                return response()->json(['status' => false, 'message' => 'Something went wrong. Please try again!']);
            }
        }catch (Exception $exception){
            session()->flash('error','EXCEPTION'.$exception->getMessage());
            return back();
        }

    }
}
