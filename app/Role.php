<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Role extends Model
{
    protected $table = 'reseller_roles';
    protected $fillable = ['title'];
    
    
    
}
