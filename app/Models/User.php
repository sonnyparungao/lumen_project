<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $primaryKey='user_id';
    public  $table = 'users';


    protected $fillable = [
        'account_type','email', 'firstname','lastname','active'
    ];


    public function userMobileNumbers()
    {
        return $this->hasMany('App\Models\UserMobileNumber', 'user_id');
    }

   
}