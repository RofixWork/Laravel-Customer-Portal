<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerCreateRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $customers = $this->filter($request);

        return Inertia::render('Customer/Index', [
            'customers' => $customers->paginate(12),
        ]);
    }

    private function filter(Request $request) : Builder
    {
        $query = Customer::query();

        $city = $request->post('city', '');
        $customerName = $request->post("name", "");
        $orderType = $request->post("order", '');

        if($customerName)
        {
           $query->where(function (Builder $queryBuilder) use ($customerName) {
            $queryBuilder->where("firstName", "like", "%$customerName%")
            ->orWhere("lastName", "like", "%$customerName%");
           });
        }

        if($city)
        {
            $query->where('city', $city);
        }

        if($orderType)
        {
            $query->orderBy('age', $orderType);
        }

        return $query->orderByDesc('updated_at');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerCreateRequest $customerCreateRequest) : RedirectResponse
    {
        $validated = $customerCreateRequest->validated();

        Customer::query()->create($validated);

        return to_route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, Customer $customer) : RedirectResponse
    {
        $validated = $request->validated();

        $customer->update($validated);

        return to_route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer) : RedirectResponse
    {
        $customer?->delete();
        return to_route('customers.index');
    }
}
