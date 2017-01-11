<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerUsersRequest;
use App\Http\Requests\UpdateCustomerUsersRequest;
use App\Repositories\CustomerUsersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CustomerUsersController extends AppBaseController
{
    /** @var  CustomerUsersRepository */
    private $customerUsersRepository;

    public function __construct(CustomerUsersRepository $customerUsersRepo)
    {
        $this->customerUsersRepository = $customerUsersRepo;
    }

    /**
     * Display a listing of the CustomerUsers.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->customerUsersRepository->pushCriteria(new RequestCriteria($request));
        $customerUsers = $this->customerUsersRepository->all();

        return view('customer_users.index')
            ->with('customerUsers', $customerUsers);
    }

    /**
     * Show the form for creating a new CustomerUsers.
     *
     * @return Response
     */
    public function create()
    {
        return view('customer_users.create');
    }

    /**
     * Store a newly created CustomerUsers in storage.
     *
     * @param CreateCustomerUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerUsersRequest $request)
    {
        $input = $request->all();

        $customerUsers = $this->customerUsersRepository->create($input);

        Flash::success('Customer Users saved successfully.');

        return redirect(route('customerUsers.index'));
    }

    /**
     * Display the specified CustomerUsers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customerUsers = $this->customerUsersRepository->findWithoutFail($id);

        if (empty($customerUsers)) {
            Flash::error('Customer Users not found');

            return redirect(route('customerUsers.index'));
        }

        return view('customer_users.show')->with('customerUsers', $customerUsers);
    }

    /**
     * Show the form for editing the specified CustomerUsers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customerUsers = $this->customerUsersRepository->findWithoutFail($id);

        if (empty($customerUsers)) {
            Flash::error('Customer Users not found');

            return redirect(route('customerUsers.index'));
        }

        return view('customer_users.edit')->with('customerUsers', $customerUsers);
    }

    /**
     * Update the specified CustomerUsers in storage.
     *
     * @param  int              $id
     * @param UpdateCustomerUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerUsersRequest $request)
    {
        $customerUsers = $this->customerUsersRepository->findWithoutFail($id);

        if (empty($customerUsers)) {
            Flash::error('Customer Users not found');

            return redirect(route('customerUsers.index'));
        }

        $customerUsers = $this->customerUsersRepository->update($request->all(), $id);

        Flash::success('Customer Users updated successfully.');

        return redirect(route('customerUsers.index'));
    }

    /**
     * Remove the specified CustomerUsers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customerUsers = $this->customerUsersRepository->findWithoutFail($id);

        if (empty($customerUsers)) {
            Flash::error('Customer Users not found');

            return redirect(route('customerUsers.index'));
        }

        $this->customerUsersRepository->delete($id);

        Flash::success('Customer Users deleted successfully.');

        return redirect(route('customerUsers.index'));
    }
}
