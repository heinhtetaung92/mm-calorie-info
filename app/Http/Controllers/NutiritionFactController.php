<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNutiritionFactRequest;
use App\Http\Requests\UpdateNutiritionFactRequest;
use App\Repositories\NutiritionFactRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NutiritionFactController extends Controller
{
    /** @var  NutiritionFactRepository */
    private $nutiritionFactRepository;

    public function __construct(NutiritionFactRepository $nutiritionFactRepo)
    {
        $this->middleware('auth');
        $this->nutiritionFactRepository = $nutiritionFactRepo;
    }

    /**
     * Display a listing of the NutiritionFact.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nutiritionFactRepository->pushCriteria(new RequestCriteria($request));
        $nutiritionFacts = $this->nutiritionFactRepository->all();

        return view('nutirition_facts.index')
            ->with('nutiritionFacts', $nutiritionFacts);
    }

    /**
     * Show the form for creating a new NutiritionFact.
     *
     * @return Response
     */
    public function create()
    {
        return view('nutirition_facts.create');
    }

    /**
     * Store a newly created NutiritionFact in storage.
     *
     * @param CreateNutiritionFactRequest $request
     *
     * @return Response
     */
    public function store(CreateNutiritionFactRequest $request)
    {
        $input = $request->all();

        $nutiritionFact = $this->nutiritionFactRepository->create($input);

        Flash::success('Nutirition Fact saved successfully.');

        return redirect(route('nutiritionFacts.index'));
    }

    /**
     * Display the specified NutiritionFact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nutiritionFact = $this->nutiritionFactRepository->findWithoutFail($id);

        if (empty($nutiritionFact)) {
            Flash::error('Nutirition Fact not found');

            return redirect(route('nutiritionFacts.index'));
        }

        return view('nutirition_facts.show')->with('nutiritionFact', $nutiritionFact);
    }

    /**
     * Show the form for editing the specified NutiritionFact.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nutiritionFact = $this->nutiritionFactRepository->findWithoutFail($id);

        if (empty($nutiritionFact)) {
            Flash::error('Nutirition Fact not found');

            return redirect(route('nutiritionFacts.index'));
        }

        return view('nutirition_facts.edit')->with('nutiritionFact', $nutiritionFact);
    }

    /**
     * Update the specified NutiritionFact in storage.
     *
     * @param  int              $id
     * @param UpdateNutiritionFactRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNutiritionFactRequest $request)
    {
        $nutiritionFact = $this->nutiritionFactRepository->findWithoutFail($id);

        if (empty($nutiritionFact)) {
            Flash::error('Nutirition Fact not found');

            return redirect(route('nutiritionFacts.index'));
        }

        $nutiritionFact = $this->nutiritionFactRepository->update($request->all(), $id);

        Flash::success('Nutirition Fact updated successfully.');

        return redirect(route('nutiritionFacts.index'));
    }

    /**
     * Remove the specified NutiritionFact from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nutiritionFact = $this->nutiritionFactRepository->findWithoutFail($id);

        if (empty($nutiritionFact)) {
            Flash::error('Nutirition Fact not found');

            return redirect(route('nutiritionFacts.index'));
        }

        $this->nutiritionFactRepository->delete($id);

        Flash::success('Nutirition Fact deleted successfully.');

        return redirect(route('nutiritionFacts.index'));
    }
}
