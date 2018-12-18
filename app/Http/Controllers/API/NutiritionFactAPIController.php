<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNutiritionFactAPIRequest;
use App\Http\Requests\API\UpdateNutiritionFactAPIRequest;
use App\Models\NutiritionFact;
use App\Repositories\NutiritionFactRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class NutiritionFactController
 * @package App\Http\Controllers\API
 */

class NutiritionFactAPIController extends Controller
{
    /** @var  NutiritionFactRepository */
    private $nutiritionFactRepository;

    public function __construct(NutiritionFactRepository $nutiritionFactRepo)
    {
        $this->nutiritionFactRepository = $nutiritionFactRepo;
    }

    /**
     * Display a listing of the NutiritionFact.
     * GET|HEAD /nutiritionFacts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nutiritionFactRepository->pushCriteria(new RequestCriteria($request));
        $this->nutiritionFactRepository->pushCriteria(new LimitOffsetCriteria($request));
        $nutiritionFacts = $this->nutiritionFactRepository->all();

        return $this->sendResponse($nutiritionFacts->toArray(), 'Nutirition Facts retrieved successfully');
    }

    /**
     * Store a newly created NutiritionFact in storage.
     * POST /nutiritionFacts
     *
     * @param CreateNutiritionFactAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNutiritionFactAPIRequest $request)
    {
        $input = $request->all();

        $nutiritionFacts = $this->nutiritionFactRepository->create($input);

        return $this->sendResponse($nutiritionFacts->toArray(), 'Nutirition Fact saved successfully');
    }

    /**
     * Display the specified NutiritionFact.
     * GET|HEAD /nutiritionFacts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var NutiritionFact $nutiritionFact */
        $nutiritionFact = $this->nutiritionFactRepository->findWithoutFail($id);

        if (empty($nutiritionFact)) {
            return $this->sendError('Nutirition Fact not found');
        }

        return $this->sendResponse($nutiritionFact->toArray(), 'Nutirition Fact retrieved successfully');
    }

    /**
     * Update the specified NutiritionFact in storage.
     * PUT/PATCH /nutiritionFacts/{id}
     *
     * @param  int $id
     * @param UpdateNutiritionFactAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNutiritionFactAPIRequest $request)
    {
        $input = $request->all();

        /** @var NutiritionFact $nutiritionFact */
        $nutiritionFact = $this->nutiritionFactRepository->findWithoutFail($id);

        if (empty($nutiritionFact)) {
            return $this->sendError('Nutirition Fact not found');
        }

        $nutiritionFact = $this->nutiritionFactRepository->update($input, $id);

        return $this->sendResponse($nutiritionFact->toArray(), 'NutiritionFact updated successfully');
    }

    /**
     * Remove the specified NutiritionFact from storage.
     * DELETE /nutiritionFacts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var NutiritionFact $nutiritionFact */
        $nutiritionFact = $this->nutiritionFactRepository->findWithoutFail($id);

        if (empty($nutiritionFact)) {
            return $this->sendError('Nutirition Fact not found');
        }

        $nutiritionFact->delete();

        return $this->sendResponse($id, 'Nutirition Fact deleted successfully');
    }

    public function sendResponse($response) {
        return $response;
    }

}
