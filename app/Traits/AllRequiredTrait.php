<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 1/15/2019
 * Time: 11:28 PM
 */

namespace App\Traits;

use App\Traits\Followable;
use App\Traits\Friendable;

trait AllRequiredTrait
{
  use Followable, Friendable;
}
