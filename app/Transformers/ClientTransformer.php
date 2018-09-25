<?php
namespace App\Transformers;
use App\Models\Client;
use League\Fractal;
class ClientTransformer extends Fractal\TransformerAbstract
{
	public function transform(Client $client)
	{
	    return [
	        'client_id'      => (int) $client->client_id,
	        'name'   => $client->name,
	        'address'    =>  $client->address,
	        'active'    =>  $client->active,
	        'created_at'    =>  $client->created_at->format('d-m-Y'),
	        'updated_at'    =>  $client->updated_at->format('d-m-Y'),
            'links'   => [
                [
                    'uri' => 'clients/'.$client->client_id,
                ]
            ],
	    ];
	}
}