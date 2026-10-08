@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#003366]">Edit Tugas</h1>
    </div>

    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" class="space-y-5 border border-gray-300 bg-white p-8 mt-4 rounded-sm">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Judul Tugas
            </label>

            <input value="{{ old('title', $task->title) }}" type="text" id="title" name="title" placeholder="Contoh: Laporan Audit Inventaris Bulanan" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
            @error('title')
                <span class="py-2 text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="department_id" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Departemen
            </label>

            <select name="department_id" id="department_id" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
                <option value="">Pilih Departemen</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id', $task->department_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
            @error('department_id')
                <span class="py-2 text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="area_id" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Area
            </label>

            <select name="area_id" id="area_id" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
                <option value="">Pilih Area</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}" {{ old('area_id', $task->area_id) == $area->id ? 'selected' : '' }}>
                        {{ $area->name }}
                    </option>
                @endforeach
            </select>
            @error('area_id')
                <span class="py-2 text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="due_at" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Batas Waktu
            </label>

            <input value="{{ old('due_at', $task->due_at) }}" type="date" id="due_at" name="due_at" placeholder="Contoh: 24-11-2026" class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
            @error('due_at')
                <span class="py-2 text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('tasks.index') }}" class="text-gray-500 py-2 px-4 hover:bg-gray-200 rounded-sm transition-all">
                Kembali
            </a>

            <button type="submit" class="bg-[#003366] text-white py-2 px-4 hover:bg-[#014991] rounded-sm transition-all ml-2">
                Simpan
            </button>
        </div>
    </form>
@endsection