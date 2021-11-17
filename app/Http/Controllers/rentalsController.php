<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterentalsRequest;
use App\Http\Requests\UpdaterentalsRequest;
use App\Repositories\rentalsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class rentalsController extends AppBaseController
{
    /** @var  rentalsRepository */
    private $rentalsRepository;

    public function __construct(rentalsRepository $rentalsRepo)
    {
        $this->rentalsRepository = $rentalsRepo;
    }

    /**
     * Display a listing of the rentals.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $rentals = $this->rentalsRepository->all();

        return view('rentals.index')
            ->with('rentals', $rentals);
    }

    /**
     * Show the form for creating a new rentals.
     *
     * @return Response
     */
    public function create()
    {
        return view('rentals.create');
    }

    /**
     * Store a newly created rentals in storage.
     *
     * @param CreaterentalsRequest $request
     *
     * @return Response
     */
    public function store(CreaterentalsRequest $request)
    {
        $input = $request->all();

        $rentals = $this->rentalsRepository->create($input);

        Flash::success('Rentals saved successfully.');

        return redirect(route('rentals.index'));
    }

    /**
     * Display the specified rentals.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rentals = $this->rentalsRepository->find($id);

        if (empty($rentals)) {
            Flash::error('Rentals not found');

            return redirect(route('rentals.index'));
        }

        return view('rentals.show')->with('rentals', $rentals);
    }

    /**
     * Show the form for editing the specified rentals.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rentals = $this->rentalsRepository->find($id);

        if (empty($rentals)) {
            Flash::error('Rentals not found');

            return redirect(route('rentals.index'));
        }

        return view('rentals.edit')->with('rentals', $rentals);
    }

    /**
     * Update the specified rentals in storage.
     *
     * @param int $id
     * @param UpdaterentalsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterentalsRequest $request)
    {
        $rentals = $this->rentalsRepository->find($id);

        if (empty($rentals)) {
            Flash::error('Rentals not found');

            return redirect(route('rentals.index'));
        }

        $rentals = $this->rentalsRepository->update($request->all(), $id);

        Flash::success('Rentals updated successfully.');

        return redirect(route('rentals.index'));
    }

    /**
     * Remove the specified rentals from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rentals = $this->rentalsRepository->find($id);

        if (empty($rentals)) {
            Flash::error('Rentals not found');

            return redirect(route('rentals.index'));
        }

        $this->rentalsRepository->delete($id);

        Flash::success('Rentals deleted successfully.');

        return redirect(route('rentals.index'));
    }
}
