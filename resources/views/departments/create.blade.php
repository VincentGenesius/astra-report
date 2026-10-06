@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#003366]">Tambah Departemen</h1>
    </div>

    <form action="{{ route('departments.store') }}" method="POST" class="space-y-5 border border-gray-300 bg-white p-8 mt-4 rounded-sm">
        @csrf

        <div>
            <label for="code" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Kode Departemen
            </label>

            <input value="{{ old('code') }}" type="text" id="code" name="code" placeholder="Contoh: HC3" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
            @error('code')
                <span class="py-2 text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="name" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Nama Departemen
            </label>

            <input value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Contoh: Human Capital, Customer Care & Communication" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
            @error('name')
                <span class="py-2 text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('departments.index') }}" class="text-gray-500 py-2 px-4 hover:bg-gray-200 rounded-sm transition-all">
                Kembali
            </a>

            <button type="submit" class="bg-[#003366] text-white py-2 px-4 hover:bg-[#014991] rounded-sm transition-all ml-2">
                Simpan
            </button>
        </div>
    </form>
@endsection