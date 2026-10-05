<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
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
        $dealers = Dealer::select('id', 'code', 'name')->get();

        return view('dealers.create', [
            'title' => $title,
            'dealers' => $dealers,
        ]);
    }

    public function store(Request $request)
    {
        $validatedRequests = $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:dealers,code'],
            'name' => ['required', 'string', 'max:50'],
        ]);

        Dealer::create($validatedRequests);

        return redirect()->route('dealers.index')->with('success', 'Dealer baru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = 'Astra Report - Edit Dealer';
        $dealers = Dealer::select('id', 'code', 'name')->get();

        return view('dealers.edit', [
            'title' => $title,
            'dealers' => $dealers,
        ]);
    }
}
