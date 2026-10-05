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
}
