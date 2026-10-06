<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Area\StoreRequest;
use App\Http\Requests\Area\UpdateRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $title = 'Astra Report - Daftar Area';
        $areas = Area::select('id', 'code', 'name')->get();

        return view('areas.index', [
            'title' => $title,
            'areas' => $areas,
        ]);
    }

    public function create()
    {
        $title = 'Astra Report - Tambah Area';

        return view('areas.create', [
            'title' => $title,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $validatedRequests = $request->validated();

        Area::create($validatedRequests);

        return redirect()->route('areas.index');
    }

    public function show(Area $area)
    {
        $title = 'Astra Report - Detail Area';

        if(!$area) {
            abort(404, 'Data Area Tidak Ditemukan.');
        }

        return view('areas.show', [
            'title' => $title,
            'area' => $area,
        ]);
    }

    public function edit(Area $area)
    {
        $title = 'Astra Report - Edit Area';

        return view('areas.edit', [
            'title' => $title,
            'area' => $area
        ]);
    }

    public function update(Area $area, UpdateRequest $request)
    {
        $validatedRequests = $request->validated();

        $area->update($validatedRequests);

        return redirect()->route('areas.index');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index');
    }
}
