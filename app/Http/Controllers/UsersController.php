<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Transformers\UserTransformer;

class UsersController extends Controller
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
     * GET all users
     * 
     * @return array
     */
    public function index(){
        $paginator = User::paginate();
        $users = $paginator->getCollection();
        $resource = new Collection($users, new UserTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        return $this->fractal->createData($resource)->toArray();
    }
 

    public function store(Request $request){
        //validate request parameters
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'firstname' => 'required',
            'lastname' => 'required',
            'account_type' => 'required'
        ]);
        $user = User::create($request->all());
        $resource = new Item($user, new UserTransformer);
        return $this->fractal->createData($resource)->toArray();
    }

     public function show($id){
        $user = User::find($id);
        $resource = new Item($user, new UserTransformer);
        return $this->fractal->createData($resource)->toArray();
    }


     public function update($id, Request $request){
        //validate request parameters
        $this->validate($request, [
             'email' => 'required|email|unique:users,email',
            'firstname' => 'required',
            'lastname' => 'required',
            'account_type' => 'required'
        ]);
        //Return error 404 response if user was not found
        if(!User::find($id)) return $this->errorResponse('User is not found!', 404);
        $client = User::find($id)->update($request->all());
        if($client){
            //return updated data
            $resource = new Item(User::find($id), new UserTransformer); 
            return $this->fractal->createData($resource)->toArray();
        }
        //Return error 400 response if updated was not successful        
        return $this->errorResponse('Failed to update user information!', 400);
    }

    public function destroy($id){
        
        //Return error 404 response if user was not found
        if(!User::find($id)) return $this->errorResponse('User is not found!', 404);
        //Return 410(done) success response if delete was successful
      
        if(User::find($id)->update(['active' => '0'])){
            return $this->customResponse('User deleted successfully!', 410);
        }
        //Return error 400 response if delete was not successful
        return $this->errorResponse('Failed to delete product!', 400);
    }



 

    public function customResponse($message = 'success', $status = 200)
    {
        return response(['status' =>  $status, 'message' => $message], $status);
    }


}