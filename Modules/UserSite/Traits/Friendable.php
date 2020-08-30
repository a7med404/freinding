<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 6/1/2018
 * Time: 4:02 PM
 */

namespace App\Traits;


use App\User;
use Modules\UserSite\Entities\Friendship;

trait Friendable
{
    public function check($id)
    {
        if (\Auth::user()->isFriendWith($id) == 1)
            return ['status' => 'Delete Friends' , 'text' => 'Friends', 'class' => 'btn btn-friends add-friend', 'url' => route('profile.friend-action', ['delete', $id]),'img'=>asset('olympus/img/relations/26_heart.png')];
        elseif (\Auth::user()->hasPendingFriendRequestFrom($id) == 1)
            return ['status' => 'Request Pending', 'text' => 'Accept Friend', 'class' => 'btn btn-accept add-friend', 'url' => route('profile.friend-action', ['accept', $id]),'img'=>asset('olympus/img/relations/checked.png')];
        elseif (\Auth::user()->hasPendingFriendRequestSent($id) == 1)
            return ['status' => 'Waiting For Accept', 'text' => 'Friend Request sent', 'class' => 'btn btn-friend-request add-friend', 'url' => route('profile.friend-action', ['delete', $id]),'img'=>asset('olympus/img/relations/55_time.png')];

        return ['status' => 'No Friend', 'text' => 'Add Friend', 'class' => 'btn btn-add add-friend', 'url' => route('profile.friend-action', ['add', $id]),'img'=>asset('olympus/img/relations/44_plus.png')];
    }

    public function addFriend($user_requested)
    {
        if ($this->id == $user_requested)
            return [false];
        if ($this->hasPendingFriendRequestSent($user_requested) == 1)
            return ["Already sent a friend request."];
        if ($this->hasPendingFriendRequestFrom($user_requested) == 1)
            return $this->acceptFriend($user_requested);
        if ($this->isFriendWith($user_requested))
            return ['You are Already Friends.'];
        $friendship = Friendship::create(['requester' => $this->id, 'user_requested' => $user_requested]);
        return 1;
    }

    /**
     * @param $user_reuested
     * @return int
     * @throws \Exception
     */
    public function deleteFriendship($user_reuested)
    {
        $friendship = Friendship::where('requester', $user_reuested)->where('user_requested', $this->id)->first();

        if ($friendship) {
            $friendship->delete();
            return 1;
        } else {
            $friendship = Friendship::where('user_requested', $user_reuested)->where('requester', $this->id)->first();
            $friendship->delete();
            return 1;
        }
        return 0;
    }

    public function acceptFriend($requester)
    {
        if ($this->hasPendingFriendRequestFrom($requester) == 0) {
            return 0;
        }
        if ($this->isFriendWith($requester)) {
            return 0;
        }
        $friendship = Friendship::where('requester', $requester)->where('user_requested', $this->id)->first();
        if ($friendship)
            $friendship->update(['is_friend' => 1]);
        return 1;
    }

    public function friends()
    {
        $friends = $fre1 = $fre2 = [];

        $fre1 = Friendship::where('is_friend', 1)->where('requester', $this->id)->get();
        $fre2 = Friendship::where('is_friend', 1)->where('user_requested', $this->id)->get();

        foreach ($fre1 as $item) {
            array_push($friends, User::find($item->user_requested));
        }
        foreach ($fre2 as $item) {
            array_push($friends, User::find($item->requester));
        }
        $array = collect($friends)->sortBy('is_online')->toArray();
        return $friends;
    }

    public function pendingFriendRequest()
    {

        $users = [];

        $friendships = Friendship::where('is_friend', 0)->where('user_requested', $this->id)->get();

        foreach ($friendships as $friendship):
            array_push($users, User::find($friendship->requester));
        endforeach;

        return $users;
    }

    public function friendsIds()
    {
        return collect($this->friends())->pluck('id')->toArray();
    }

    public function isFriendWith($user)
    {
        if (in_array($user, $this->friendsIds())) {
            return true;
        } else
            return false;
    }

    public function pendingFriendRequestIds()
    {
        return collect($this->pendingFriendRequest())->pluck('id')->toArray();
    }

    public function pendingFriendRequestsSent()
    {
        $users = [];

        $friendships = Friendship::where('is_friend', 0)->where('requester', $this->id)->get();

        foreach ($friendships as $friendship) :
            array_push($users, User::find($friendship->user_requested));
        endforeach;

        return $users;
    }

    public function pendingFriendRequestsSentIds()
    {
        return collect($this->pendingFriendRequestsSent())->pluck('id')->toArray();
    }


    public function hasPendingFriendRequestFrom($user)
    {
        if (in_array($user, $this->pendingFriendRequestIds())) {
            return true;
        } else
            return false;
    }

    public function hasPendingFriendRequestSent($user)
    {
        if (in_array($user, $this->pendingFriendRequestsSentIds())) {
            return true;
        } else
            return false;
    }

}
