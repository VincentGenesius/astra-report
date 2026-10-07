@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#003366]">Detail Departemen</h1>
    </div>

    <div class="space-y-5 border border-gray-300 bg-white p-8 mt-4 rounded-sm">

        <div class="flex items-center">
            <label class="w-50 text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Judul Tugas
            </label>

            <div class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
                {{ $task->title }}
            </div>
        </div>

        <div class="flex items-center">
            <label class="w-50 text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Nama Departemen
            </label>

            <div class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
                {{ $task->department->name }}
            </div>
        </div>

        <div class="flex items-center">
            <label class="w-50 text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Nama Area
            </label>

            <div class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
                {{ $task->area->name }}
            </div>
        </div>

        <div class="flex items-center">
            <label class="w-50 text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Batas Waktu
            </label>

            <div class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
                {{ $task->due_at }}
            </div>
        </div>

        <div class="flex items-center">
            <label class="w-50 text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Dibuat oleh
            </label>

            <div class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
                {{ $task->creator->name }}
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="text-gray-500 py-2 px-4 hover:bg-gray-200 rounded-sm transition-all">
                Edit
            </a>

            <a href="{{ route('tasks.index') }}" class="bg-[#003366] text-white py-2 px-4 hover:bg-[#014991] rounded-sm transition-all ml-2">
                Kembali
            </a>
        </div>
    </div>
@endsection