<?php
namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Transformers\ClientTransformer;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $fractal;
    public function __construct()
    {
        $this->fractal = new Manager();  
    }
    /**
     * GET all clients
     * 
     * @return array
     */
    public function index(){
        $paginator = Client::paginate();
        $clients = $paginator->getCollection();
        $resource = new Collection($clients, new ClientTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        return $this->fractal->createData($resource)->toArray();
    }
 

    public function store(Request $request){
        //validate request parameters
        $this->validate($request, [
            'name' => 'required|max:255',
            'address' => 'required'
        ]);
        $client = Client::create($request->all());
        $resource = new Item($client, new ClientTransformer);
        return $this->fractal->createData($resource)->toArray();
    }

     public function show($id){
        $client = Client::find($id);
        $resource = new Item($client, new ClientTransformer);
        return $this->fractal->createData($resource)->toArray();
    }


     public function update($id, Request $request){
        //validate request parameters
        $this->validate($request, [
            'name' => 'max:255',
            'address' => 'required'
        ]);
        //Return error 404 response if client was not found
        if(!Client::find($id)) return $this->errorResponse('client is not found!', 404);
        $client = Client::find($id)->update($request->all());
        if($client){
            //return updated data
            $resource = new Item(Client::find($id), new ClientTransformer); 
            return $this->fractal->createData($resource)->toArray();
        }
        //Return error 400 response if updated was not successful        
        return $this->errorResponse('Failed to update client information!', 400);
    }

    public function destroy($id){
        
        //Return error 404 response if product was not found
        if(!Client::find($id)) return $this->errorResponse('Client is not found!', 404);
        //Return 410(done) success response if delete was successful

        if(Client::find($id)->update(['active' => '0'])){
            return $this->customResponse('Client deleted successfully!', 410);
        }
        //Return error 400 response if delete was not successful
        return $this->errorResponse('Failed to delete product!', 400);
    }


    public function customResponse($message = 'success', $status = 200)
    {
        return response(['status' =>  $status, 'message' => $message], $status);
    }


}