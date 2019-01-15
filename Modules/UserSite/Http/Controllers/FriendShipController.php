<?php

namespace  Modules\UserSite\Http\Controllers\Site;

use App\Http\Controllers\Site\SiteController;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use DB;

class FriendShipController extends SiteController {

    public function check($id)
    {
        if (\Auth::user()->isFriendWith($id) == 1)
            return ['status' => 'friends'];
        elseif (\Auth::user()->hasPendingFriendRequestForm($id) == 1)
            return ['status' => 'pending'];
        elseif (\Auth::user()->hasPendingFriendRequestSent($id) == 1)
            return ['status' => 'waiting'];
        elseif (\Auth::id() == $id)
            return ['status' => 'self','user'=>\Auth::user()];

        return ['status' => 'no'];
    }

}

