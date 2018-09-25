<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UserMobileNumber extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $primaryKey='mobile_number_id';
    public  $table = 'user_mobile_numbers';


    protected $fillable = [
        'mobile_number','user_id','active'
    ];


   
}