<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use App\Http\Requests\UserStoreRequest;
use Flash;

class UserController extends Controller
{
    /** @var  UserRepository */
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->middleware('auth');
        $this->userRepo = $userRepo;
    }

    /**
     * Show the form for creating a new NutiritionFact.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Display a listing of the Users.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->userRepo->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepo->all();

        return view('users.index')
            ->with('role', Auth::user()->role)
            ->with('users', $users);
    }

    /**
     * Store a newly created NutiritionFact in storage.
     *
     * @param CreateNutiritionFactRequest $request
     *
     * @return Response
     */
    public function store(UserStoreRequest $request)
    {
        $input = $request->all();
        $input['role'] = 'guest';
        $input['password'] = bcrypt($request->input('password'));

        $users = $this->userRepo->create($input);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

}
