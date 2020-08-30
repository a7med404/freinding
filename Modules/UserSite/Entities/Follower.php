<?php

namespace Modules\UserSite\Entities;

/**
 * Class Follower
 * @package Modules\UserSite\Entities
 * @property int $requester
 * @property int $user_requested
 * @property int $followed
 * @property int $re_followed
 */

class Follower extends \Eloquent
{
    protected $fillable = ['requester', 'user_requested', 'followed','re_followed'];

}
