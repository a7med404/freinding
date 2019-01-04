<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 1/2/2019
 * Time: 10:16 PM
 */

namespace Modules\UserSite\Entities;


class City extends \Eloquent
{
    protected $fillable = ['code', 'name_en', 'name_ar','country_id'];
}
