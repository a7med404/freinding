<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UsersIds;
use DB;
use Hash;
use Auth;
use App\User;


class IdsController extends Controller
{
    
    protected $guard = 'admin';

    public function index(Request $request)
    {
        $data = UsersIds::with('user')->orderBy('id', 'DESC')->paginate(5);
        $type_action = 'المستخدم';

        return view('admin.users.ids', compact('data', 'type_action'));
    }


    public function postverification(Request $request)
    {

        DB::enableQueryLog();

        if ($request->status == 'verified') {
            $update = UsersIds::where('user_id', $request->user_id)
                ->update(['status' => 'verified']);
            dd(DB::getQueryLog());
            return response()->json([
                'message' => 'Verification status updated successfully',
                'class_name' => 'alert-success'
            ]);

        } else if ($request->status == 'unverified') {
            UsersIds::where('user_id', $request->user_id)
                ->update(['status' => 'unverified']);
            return response()->json([
                'message' => 'Verificationasdasdas status updated successfully',
                'class_name' => 'alert-success'
            ]);
        }

    }

    public function destroy($id)
    {

       $delete = UsersIds::where('user_id', $id)->delete();
        return response()->json([
            'message', 'User deleted successfully'
        ]);
    }

}



