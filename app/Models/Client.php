<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $primaryKey='client_id';
    public  $table = 'clients';


    protected $fillable = [
        'name', 'address','active'
    ];
}