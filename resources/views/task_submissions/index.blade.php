@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="">
        <h1 class="font-bold text-2xl text-[#003366]">Daftar Tugas</h1>
    </div>

    <div class="border border-gray-300 bg-white rounded-sm mt-4">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-gray-300 uppercase tracking-wider text-gray-500">
                    <th class="px-5 py-3 font-semibold">No.</th>
                    <th class="py-3 font-semibold">Judul Tugas</th>
                    <th class="py-3 font-semibold">Departemen</th>
                    <th class="py-3 font-semibold">Area</th>
                    <th class="py-3 font-semibold">Batas Waktu</th>
                    <th class="px-3 py-3 font-semibold">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-[#16213A]">
                @forelse ($tasks as $task)
                    @php
                        $sub = $submissions[$task->id] ?? null;
                    @endphp

                    <tr>
                        <td class="px-5 py-3">
                            {{ $loop->iteration }}
                        </td>
                        <td class="py-3">
                            {{ $task->title }}
                        </td>
                        <td class="py-3">
                            {{ $task->department->name }}
                        </td>
                        <td class="py-3">
                            {{ $task->area->name }}
                        </td>
                        <td class="py-3">
                            {{ $task->due_at }}
                        </td>
                        <td class="px-3 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('task-submissions.create', $task->id) }}" class="text-green-500 hover:text-green-700">
                                    {{ $sub ? 'Lihat Tugas' : 'Kumpul Tugas' }}
                                </a>
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