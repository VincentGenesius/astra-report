@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#003366]">Edit Dealer</h1>
    </div>

    <form action="" method="PUT" class="space-y-5 border border-gray-300 bg-white p-8 mt-4 rounded-sm">
        @csrf

        <div>
            <label for="code" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Kode Dealer
            </label>

            <input type="text" id="code" name="code" placeholder="Contoh: DLR-AYANI" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
        </div>

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Nama Dealer
            </label>

            <input type="text" id="name" name="name" placeholder="Contoh: Astra Motor Ayani Pontianak" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('dealers.index') }}" class="text-gray-500 py-2 px-4 hover:bg-gray-200 rounded-sm transition-all">
                Kembali
            </a>

            <button type="submit" class="bg-[#003366] text-white py-2 px-4 hover:bg-[#014991] rounded-sm transition-all ml-2">
                Simpan
            </button>
        </div>
    </form>
@endsection