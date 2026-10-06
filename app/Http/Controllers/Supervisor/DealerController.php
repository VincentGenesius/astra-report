<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dealer\StoreRequest;
use App\Http\Requests\Dealer\UpdateRequest;
use App\Models\Dealer;
use Illuminate\Http\Request;

class DealerController extends Controller
{
    public function index()
    {
        $title = 'Astra Report - Daftar Dealer';
        $dealers = Dealer::select('id', 'code', 'name')->get();

        return view('dealers.index', [
            'title' => $title,
            'dealers' => $dealers,
        ]);
    }

    public function create()
    {
        $title = 'Astra Report - Tambah Dealer';

        return view('dealers.create', [
            'title' => $title,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $validatedRequests = $request->validated();

        Dealer::create($validatedRequests);

        return redirect()->route('dealers.index');
    }

    public function show(Dealer $dealer)
    {
        $title = 'Astra Report - Detail Dealer';

        if(!$dealer) {
            abort(404, 'Data Dealer Tidak Ditemukan.');
        }

        return view('dealers.show', [
            'title' => $title,
            'dealer' => $dealer,
        ]);
    }

    public function edit(Dealer $dealer)
    {
        $title = 'Astra Report - Edit Dealer';

        return view('dealers.edit', [
            'title' => $title,
            'dealer' => $dealer
        ]);
    }

    public function update(Dealer $dealer, UpdateRequest $request)
    {
        $validatedRequests = $request->validated();

        $dealer->update($validatedRequests);

        return redirect()->route('dealers.index');
    }

    public function destroy(Dealer $dealer)
    {
        $dealer->delete();

        return redirect()->route('dealers.index');
    }
}
