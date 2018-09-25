<?php
namespace App\Http\Controllers;
use App\Models\UserMobileNumber;
use Illuminate\Http\Request;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Transformers\UserMobileNumberTransformer;

class UserMobileNumberController extends Controller
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
     * GET all Users Mobile Number
     * 
     * @return array
     */
    public function index(){
        $paginator = UserMobileNumber::paginate();
        $userMobileNumbers = $paginator->getCollection();
        $resource = new Collection($userMobileNumbers, new UserMobileNumberTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
        return $this->fractal->createData($resource)->toArray();
    }
 

    public function store(Request $request){
        //validate request parameters
        $this->validate($request, [
            'mobile_number' => 'required|unique:user_mobile_numbers,mobile_number',
            'user_id' => 'required'
        ]);
        $userMobileNumber = UserMobileNumber::create($request->all());
        $resource = new Item($userMobileNumber, new UserMobileNumberTransformer);
        return $this->fractal->createData($resource)->toArray();
    }

     public function show($id){
        $userMobileNumber = UserMobileNumber::find($id);
        $resource = new Item($userMobileNumber, new UserMobileNumberTransformer);
        return $this->fractal->createData($resource)->toArray();
    }


     public function update($id, Request $request){
        //validate request parameters
        $this->validate($request, [
            'mobile_number' => 'required|unique:user_mobile_numbers,mobile_number',
            'user_id' => 'required'
        ]);
        //Return error 404 response if user was not found
        if(!UserMobileNumber::find($id)) return $this->errorResponse('User Mobile Number is not found!', 404);
        $userMobileNumber = UserMobileNumber::find($id)->update($request->all());
        if($userMobileNumber){
            //return updated data
            $resource = new Item(UserMobileNumber::find($id), new UserMobileNumberTransformer); 
            return $this->fractal->createData($resource)->toArray();
        }
        //Return error 400 response if updated was not successful        
        return $this->errorResponse('Failed to update user information!', 400);
    }


    public function destroy($id){
        
        //Return error 404 response if user mobile number was not found
        if(!UserMobileNumber::find($id)) return $this->errorResponse('User mobile number is not found!', 404);
        //Return 410(done) success response if delete was successful
      
        if(UserMobileNumber::find($id)->update(['active' => '0'])){
            return $this->customResponse('User mobile number deleted successfully!', 410);
        }
        //Return error 400 response if delete was not successful
        return $this->errorResponse('Failed to delete product!', 400);
    }


    public function customResponse($message = 'success', $status = 200)
    {
        return response(['status' =>  $status, 'message' => $message], $status);
    }


}