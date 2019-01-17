<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 1/15/2019
 * Time: 11:28 PM
 */

namespace App\Traits;


use App\User;
use Modules\UserSite\Entities\Follower;

trait Followable
{
    public function checkFollow($id)
    {
        if (\Auth::user()->isFollowing($id) == 1 && \Auth::user()->isFollowedBy($id) == 1)
            return ['status' => 'Following', 'text' => 'Following', 'class' => 'btn btn-following add-friend', 'url' => route('profile.friend-action', ['un-follow', $id]), 'img' => asset('olympus/img/relations/30_antenna.png')];
        else if (\Auth::user()->isFollowedBy($id) == 1 && !\Auth::user()->isFollowing($id) == 1)
            return ['status' => 'Follow Back', 'text' => 'Follow Back', 'class' => 'btn btn-follow-back add-friend', 'url' => route('profile.friend-action', ['follow-back', $id]), 'img' => asset('olympus/img/relations/30_antenna.png')];
        else if (!\Auth::user()->isFollowedBy($id) == 1 && \Auth::user()->isFollowing($id) == 1)
            return ['status' => 'Follow Back', 'text' => 'Follow Back', 'class' => 'btn btn-follow-back add-friend', 'url' => route('profile.friend-action', ['follow-back', $id]), 'img' => asset('olympus/img/relations/30_antenna.png')];
        else if (\Auth::user()->isFollowedBy($id) == 1)
            return ['status' => 'Follow Back', 'text' => 'Follow Back', 'class' => 'btn btn-follow-back add-friend', 'url' => route('profile.friend-action', ['follow-back', $id]), 'img' => asset('olympus/img/relations/30_antenna.png')];

        return ['status' => 'Follow', 'text' => 'Just Follow', 'class' => 'btn btn-follow add-friend', 'url' => route('profile.friend-action', ['follow', $id]), 'img' => asset('olympus/img/relations/rss-symbol.png')];
    }

    public function follow($userId)
    {
        $follow = Follower::create(['requester' => $this->id, 'user_requested' => $userId, 'followed' => 1]);
        return 1;
    }

    public function reFollow($userId)
    {
        $followed = Follower::where('requester', $userId)->where('user_requested', $this->id)->first();
        if ($followed) {
            $followed->update(['re_followed' => 1]);
        } else {
            $followed = Follower::where('requester', $this->id)->where('user_requested', $userId)->first();
            $followed->update(['followed' => 1]);
        }
        return 1;
    }

    public function unFollow($userId)
    {
        $followed = Follower::where('requester', $userId)->where('user_requested', $this->id)->first();
        if ($followed) {
            $followed->update(['re_followed' => 0]);
        } else {
            $followed = Follower::where('requester', $this->id)->where('user_requested', $userId)->first();
            $followed->update(['followed' => 0]);
        }
        return 1;
    }

    public function isFollowedBy($userId)
    {
        if (in_array($userId, $this->followersIds()))
            return true;
        else
            return false;
    }

    public function isFollowing($userId)
    {
        if (in_array($userId, $this->followingIds()))
            return true;
        else
            return false;
    }

    public function followers()
    {
        $followers = $followers1 = $followers2 = [];

        $followers1 = Follower::where('requester', $this->id)->where('re_followed', 1)->get();
        $followers2 = Follower::where('user_requested', $this->id)->where('followed', 1)->get();

        foreach ($followers1 as $item) {
            array_push($followers, User::find($item->user_requested));
        }
        foreach ($followers2 as $item) {
            array_push($followers, User::find($item->requester));
        }
        return $followers;
    }

    public function followersIds()
    {
        return collect($this->followers())->pluck('id')->toArray();
    }

    public function following()
    {
        $followers = $followers1 = $followers2 = [];

        $followers1 = Follower::where('requester', $this->id)->where('followed', 1)->get();
        $followers2 = Follower::where('user_requested', $this->id)->where('re_followed', 1)->get();

        foreach ($followers1 as $item) {
            array_push($followers, User::find($item->user_requested));
        }
        foreach ($followers2 as $item) {
            array_push($followers, User::find($item->requester));
        }
        return $followers;
    }

    public function followingIds()
    {
        return collect($this->following())->pluck('id')->toArray();
    }
}
