<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerCompaniesRequest;
use App\Http\Requests\UpdateCustomerCompaniesRequest;
use App\Repositories\CustomerCompaniesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CustomerCompaniesController extends AppBaseController
{
    /** @var  CustomerCompaniesRepository */
    private $customerCompaniesRepository;

    public function __construct(CustomerCompaniesRepository $customerCompaniesRepo)
    {
        $this->customerCompaniesRepository = $customerCompaniesRepo;
    }

    /**
     * Display a listing of the CustomerCompanies.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->customerCompaniesRepository->pushCriteria(new RequestCriteria($request));
        $customerCompanies = $this->customerCompaniesRepository->all();

        return view('customer_companies.index')
            ->with('customerCompanies', $customerCompanies);
    }

    /**
     * Show the form for creating a new CustomerCompanies.
     *
     * @return Response
     */
    public function create()
    {
        return view('customer_companies.create');
    }

    /**
     * Store a newly created CustomerCompanies in storage.
     *
     * @param CreateCustomerCompaniesRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerCompaniesRequest $request)
    {
        $input = $request->all();

        $customerCompanies = $this->customerCompaniesRepository->create($input);

        Flash::success('Customer Companies saved successfully.');

        return redirect(route('customerCompanies.index'));
    }

    /**
     * Display the specified CustomerCompanies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customerCompanies = $this->customerCompaniesRepository->findWithoutFail($id);

        if (empty($customerCompanies)) {
            Flash::error('Customer Companies not found');

            return redirect(route('customerCompanies.index'));
        }

        return view('customer_companies.show')->with('customerCompanies', $customerCompanies);
    }

    /**
     * Show the form for editing the specified CustomerCompanies.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customerCompanies = $this->customerCompaniesRepository->findWithoutFail($id);

        if (empty($customerCompanies)) {
            Flash::error('Customer Companies not found');

            return redirect(route('customerCompanies.index'));
        }

        return view('customer_companies.edit')->with('customerCompanies', $customerCompanies);
    }

    /**
     * Update the specified CustomerCompanies in storage.
     *
     * @param  int              $id
     * @param UpdateCustomerCompaniesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerCompaniesRequest $request)
    {
        $customerCompanies = $this->customerCompaniesRepository->findWithoutFail($id);

        if (empty($customerCompanies)) {
            Flash::error('Customer Companies not found');

            return redirect(route('customerCompanies.index'));
        }

        $customerCompanies = $this->customerCompaniesRepository->update($request->all(), $id);

        Flash::success('Customer Companies updated successfully.');

        return redirect(route('customerCompanies.index'));
    }

    /**
     * Remove the specified CustomerCompanies from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customerCompanies = $this->customerCompaniesRepository->findWithoutFail($id);

        if (empty($customerCompanies)) {
            Flash::error('Customer Companies not found');

            return redirect(route('customerCompanies.index'));
        }

        $this->customerCompaniesRepository->delete($id);

        Flash::success('Customer Companies deleted successfully.');

        return redirect(route('customerCompanies.index'));
    }
}
