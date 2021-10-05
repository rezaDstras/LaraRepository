<?php


namespace App\Repositories;


use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryContract
{
    public function index()
    {
        return Customer::whereStatus(1)
            ->with('user')
            ->get()
            ->map->format();

//            ->map(function ($customer){
//                return[
//                    'customer_id'=>$customer->id,
//                    'user_name'=>$customer->user->name,
//                    'name'=>$customer->name,
//                    'last_updated'=>$customer->updated_at->diffForHumans(),
//                ];
//            });
    }

    public function findById($customer)
    {
        return Customer::with('user')->find($customer)->format();

    }
    public function findByName()
    {

    }

    public function update($customer)
    {
       $customer= Customer::whereId($customer->id)->firstOrFail();
       $customer->update(request()->only('name'));
    }
    public function delete($customer)
    {
       Customer::find($customer)->delete();

    }

}
