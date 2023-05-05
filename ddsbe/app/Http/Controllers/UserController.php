<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    private $request;
    public $timestamps = false;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function showUsers() {
        return response()->json(User::all());
    }


    public function showUser($id) {

        try{
        $user = User::findOrFail($id);
        return response()->json($user);
    } catch (\Exception $exception ) {
        return response()->json('{"error":"User Not Found"}', 404);
    }

    }

    public function addUser(Request $request){
        $rules = [
            'username' => 'required | max:20',
            'password' => 'required | max:20'
        ];

        $this->validate($request, $rules);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function deleteUser($id) {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json($user, 200);
    }

    public function updateUser(Request $request, $id) {
        $rules = [
            'username' => 'required | max:20',
            'password' => 'required | max:20'
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($id);

        $user->fill($request->all());

        //dd($user);

        if ($user->isClean()) {
            return response()->json("At least one value must
            change", 403);
        } else {
            $user->save();
            return response()->json($user, 200);
        }

    }
    
}