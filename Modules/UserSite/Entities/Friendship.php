<?php

namespace Modules\UserSite\Entities;


class Friendship extends \Eloquent
{
    protected $fillable = ['requester', 'user_requested', 'is_friend','is_follow'];
}
