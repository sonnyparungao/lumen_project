<?php
namespace App\Transformers;
use App\Models\UserMobileNumber;
use League\Fractal;
class UserMobileNumberTransformer extends Fractal\TransformerAbstract
{
	public function transform(UserMobileNumber $userMobileNumber)
	{
	    return [
	        'mobile_number_id'      => (int) $userMobileNumber->mobile_number_id,
	        'mobile_number'   => $userMobileNumber->mobile_number,
	        'created_by_user_id'    =>  $userMobileNumber->created_by_user_id,
	        'active'    =>  $userMobileNumber->active,
	        'created_at'    =>  $userMobileNumber->created_at->format('d-m-Y'),
	        'updated_at'    =>  $userMobileNumber->updated_at->format('d-m-Y'),
            'links'   => [
                [
                    'uri' => 'userMobileNumbers/'.$userMobileNumber->mobile_number_id,
                ]
            ],
	    ];
	}
}