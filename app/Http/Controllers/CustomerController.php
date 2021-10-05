<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryContract;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */

    private $customerRepository;

    public function __construct(CustomerRepositoryContract $customerRepository)
    {
        $this->customerRepository=$customerRepository;
    }
    public function index()
    {

        return $this->customerRepository->index();
//       return Customer::whereStatus(1)
//           ->with('user')
//           ->get()
//           ->map(function ($customer){
//               return[
//                   'customer_id'=>$customer->id,
//                   'user_name'=>$customer->user->name,
//                   'name'=>$customer->name,
//                   'last_updated'=>$customer->updated_at->diffForHumans(),
//               ];
//           });

    }

    public function show($customer)
    {
        return $this->customerRepository->findById($customer);
    }

    public function update($customer)
    {
        $this->customerRepository->update($customer);
        return redirect("/customer/$customer");
    }
    public function destroy($customer)
    {
         $this->customerRepository->delete($customer);
         return redirect('/customer');
    }
}
