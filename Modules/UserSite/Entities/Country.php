<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 1/2/2019
 * Time: 10:16 PM
 */

namespace Modules\UserSite\Entities;


class Country extends \Eloquent
{
    protected $fillable = ['code', 'name_en', 'name_ar','nationality_en','nationality_ar'];
}
