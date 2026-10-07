@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#003366]">Daftar Tugas</h1>

        <a href="{{ route('tasks.create') }}" class="bg-[#003366] text-white py-2 px-4 hover:bg-[#014991] rounded-sm transition-all">Tambah Tugas Baru</a>
    </div>

    <div class="border border-gray-300 bg-white rounded-sm mt-4">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-gray-300 uppercase tracking-wider text-gray-500">
                    <th class="w-14 px-5 py-3 font-semibold">No.</th>
                    <th class="px-5 py-3 font-semibold">Judul Tugas</th>
                    <th class="px-5 py-3 font-semibold">Departemen</th>
                    <th class="px-5 py-3 font-semibold">Area</th>
                    <th class="px-5 py-3 font-semibold">Pembuat</th>
                    <th class="py-3 font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-[#16213A]">
                @forelse ($tasks as $task)
                    <tr>
                        <td class="px-5 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $task->title }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $task->department->name }}
                        </td>
                        <td class="px-5 py-3">
                            {{ $task->area->name }}
                        </td>
                        <td class="py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" class="text-green-500 hover:text-green-700">Lihat</a>
                                <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" onsubmit="return confirm('Hapus data tugas ini dari daftar?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center p-4">Data Tugas Tidak Tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection