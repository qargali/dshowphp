<?php

namespace App\Models;

use Core\Model;

/**
 * User Model
 */
class User extends Model
{
    // Entering insertable fields
    protected $insertables = array(
      'username',
      'email',
      'password'
    );
}
