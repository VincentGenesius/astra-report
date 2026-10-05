@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#003366]">Daftar Dealer</h1>

        <a href="{{ route('dealers.create') }}" class="bg-[#003366] text-white py-2 px-4 hover:bg-[#014991] rounded-sm transition-all">Tambah Dealer Baru</a>
    </div>

    <div class="border border-gray-300 bg-white rounded-sm mt-4">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-gray-300 uppercase tracking-wider text-gray-500">
                    <th class="w-14 px-5 py-3 font-semibold">No.</th>
                    <th class="px-5 py-3 font-semibold">Kode Dealer</th>
                    <th class="px-5 py-3 font-semibold">Nama Dealer</th>
                    <th class="py-3 font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-[#16213A]">
                @foreach ($dealers as $dealer)
                    <tr>
                        <td class="px-5 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $dealer->code }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $dealer->name }}
                        </td>
                        <td class="py-3">
                            <a href="{{ route('dealers.show', ['id' => $dealer->id]) }}" class="text-green-500 hover:text-green-700">Lihat</a>
                            <a href="#" class="text-blue-500 hover:text-blue-700 ml-2">Edit</a>
                            <a href="#" class="text-red-500 hover:text-red-700 ml-2">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection