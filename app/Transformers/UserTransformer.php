<?php
namespace App\Transformers;
use App\Models\User;
use League\Fractal;
class UserTransformer extends Fractal\TransformerAbstract
{

	 /**
     * List of resources to automatically include
     *
     * @var array
     */
	 protected $defaultIncludes = [
        'userMobileNumbers',
    ];



	public function transform(User $user)
	{
	    return [
	        'user_id'      => (int) $user->user_id,
	        'account_type'   => $user->account_type,
	        'email'    =>  $user->email,
	        'firstname'    =>  $user->firstname,
	        'lastname'    =>  $user->lastname,
	        'created_at'    =>  $user->created_at->format('d-m-Y'),
	        'updated_at'    =>  $user->updated_at->format('d-m-Y'),
            'links'   => [
                [
                    'uri' => 'users/'.$user->user_id,
                ]
            ],
	    ];
	}

	 /**
     * Include User Mobile Numbers
     *
     * @param  User  $user
     *
     * @return League\Fractal\Resource\Collection
     */
    public function includeUserMobileNumbers(User $user)
    {
        return $this->collection($user->userMobileNumbers, new UserMobileNumberTransformer);
    }


}