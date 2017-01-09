<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCustomerCompaniesAPIRequest;
use App\Http\Requests\API\UpdateCustomerCompaniesAPIRequest;
use App\Models\CustomerCompanies;
use App\Repositories\CustomerCompaniesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CustomerCompaniesController
 * @package App\Http\Controllers\API
 */

class CustomerCompaniesAPIController extends AppBaseController
{
    /** @var  CustomerCompaniesRepository */
    private $customerCompaniesRepository;

    public function __construct(CustomerCompaniesRepository $customerCompaniesRepo)
    {
        $this->customerCompaniesRepository = $customerCompaniesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/customerCompanies",
     *      summary="Get a listing of the CustomerCompanies.",
     *      tags={"CustomerCompanies"},
     *      description="Get all CustomerCompanies",
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
     *                  @SWG\Items(ref="#/definitions/CustomerCompanies")
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
        $this->customerCompaniesRepository->pushCriteria(new RequestCriteria($request));
        $this->customerCompaniesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $customerCompanies = $this->customerCompaniesRepository->all();

        return $this->sendResponse($customerCompanies->toArray(), 'Customer Companies retrieved successfully');
    }

    /**
     * @param CreateCustomerCompaniesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/customerCompanies",
     *      summary="Store a newly created CustomerCompanies in storage",
     *      tags={"CustomerCompanies"},
     *      description="Store CustomerCompanies",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CustomerCompanies that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CustomerCompanies")
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
     *                  ref="#/definitions/CustomerCompanies"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCustomerCompaniesAPIRequest $request)
    {
        $input = $request->all();

        $customerCompanies = $this->customerCompaniesRepository->create($input);

        return $this->sendResponse($customerCompanies->toArray(), 'Customer Companies saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/customerCompanies/{id}",
     *      summary="Display the specified CustomerCompanies",
     *      tags={"CustomerCompanies"},
     *      description="Get CustomerCompanies",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CustomerCompanies",
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
     *                  ref="#/definitions/CustomerCompanies"
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
        /** @var CustomerCompanies $customerCompanies */
        $customerCompanies = $this->customerCompaniesRepository->findWithoutFail($id);

        if (empty($customerCompanies)) {
            return $this->sendError('Customer Companies not found');
        }

        return $this->sendResponse($customerCompanies->toArray(), 'Customer Companies retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCustomerCompaniesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/customerCompanies/{id}",
     *      summary="Update the specified CustomerCompanies in storage",
     *      tags={"CustomerCompanies"},
     *      description="Update CustomerCompanies",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CustomerCompanies",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CustomerCompanies that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CustomerCompanies")
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
     *                  ref="#/definitions/CustomerCompanies"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCustomerCompaniesAPIRequest $request)
    {
        $input = $request->all();

        /** @var CustomerCompanies $customerCompanies */
        $customerCompanies = $this->customerCompaniesRepository->findWithoutFail($id);

        if (empty($customerCompanies)) {
            return $this->sendError('Customer Companies not found');
        }

        $customerCompanies = $this->customerCompaniesRepository->update($input, $id);

        return $this->sendResponse($customerCompanies->toArray(), 'CustomerCompanies updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/customerCompanies/{id}",
     *      summary="Remove the specified CustomerCompanies from storage",
     *      tags={"CustomerCompanies"},
     *      description="Delete CustomerCompanies",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CustomerCompanies",
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
        /** @var CustomerCompanies $customerCompanies */
        $customerCompanies = $this->customerCompaniesRepository->findWithoutFail($id);

        if (empty($customerCompanies)) {
            return $this->sendError('Customer Companies not found');
        }

        $customerCompanies->delete();

        return $this->sendResponse($id, 'Customer Companies deleted successfully');
    }
}
