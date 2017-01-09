<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCustomerUsersAPIRequest;
use App\Http\Requests\API\UpdateCustomerUsersAPIRequest;
use App\Models\CustomerUsers;
use App\Repositories\CustomerUsersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CustomerUsersController
 * @package App\Http\Controllers\API
 */

class CustomerUsersAPIController extends AppBaseController
{
    /** @var  CustomerUsersRepository */
    private $customerUsersRepository;

    public function __construct(CustomerUsersRepository $customerUsersRepo)
    {
        $this->customerUsersRepository = $customerUsersRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/customerUsers",
     *      summary="Get a listing of the CustomerUsers.",
     *      tags={"CustomerUsers"},
     *      description="Get all CustomerUsers",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/CustomerUsers")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->customerUsersRepository->pushCriteria(new RequestCriteria($request));
        $this->customerUsersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $customerUsers = $this->customerUsersRepository->all();

        return $this->sendResponse($customerUsers->toArray(), 'Customer Users retrieved successfully');
    }

    /**
     * @param CreateCustomerUsersAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/customerUsers",
     *      summary="Store a newly created CustomerUsers in storage",
     *      tags={"CustomerUsers"},
     *      description="Store CustomerUsers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CustomerUsers that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CustomerUsers")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CustomerUsers"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCustomerUsersAPIRequest $request)
    {
        $input = $request->all();

        $customerUsers = $this->customerUsersRepository->create($input);

        return $this->sendResponse($customerUsers->toArray(), 'Customer Users saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/customerUsers/{id}",
     *      summary="Display the specified CustomerUsers",
     *      tags={"CustomerUsers"},
     *      description="Get CustomerUsers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CustomerUsers",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CustomerUsers"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var CustomerUsers $customerUsers */
        $customerUsers = $this->customerUsersRepository->findWithoutFail($id);

        if (empty($customerUsers)) {
            return $this->sendError('Customer Users not found');
        }

        return $this->sendResponse($customerUsers->toArray(), 'Customer Users retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCustomerUsersAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/customerUsers/{id}",
     *      summary="Update the specified CustomerUsers in storage",
     *      tags={"CustomerUsers"},
     *      description="Update CustomerUsers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CustomerUsers",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CustomerUsers that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CustomerUsers")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/CustomerUsers"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCustomerUsersAPIRequest $request)
    {
        $input = $request->all();

        /** @var CustomerUsers $customerUsers */
        $customerUsers = $this->customerUsersRepository->findWithoutFail($id);

        if (empty($customerUsers)) {
            return $this->sendError('Customer Users not found');
        }

        $customerUsers = $this->customerUsersRepository->update($input, $id);

        return $this->sendResponse($customerUsers->toArray(), 'CustomerUsers updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/customerUsers/{id}",
     *      summary="Remove the specified CustomerUsers from storage",
     *      tags={"CustomerUsers"},
     *      description="Delete CustomerUsers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CustomerUsers",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var CustomerUsers $customerUsers */
        $customerUsers = $this->customerUsersRepository->findWithoutFail($id);

        if (empty($customerUsers)) {
            return $this->sendError('Customer Users not found');
        }

        $customerUsers->delete();

        return $this->sendResponse($id, 'Customer Users deleted successfully');
    }
}
