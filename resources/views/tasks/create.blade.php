@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-2xl text-[#003366]">Pengumpulan Tugas</h1>
    </div>

    <div class="border border-gray-300 bg-white p-6 mt-4 rounded-sm space-y-3">
        <h2 class="font-bold text-lg text-[#003366] border-b pb-2">{{ $task->title }}</h2>
        <div class="grid grid-cols-2 gap-4 text-sm text-[#16213A]">
            <div>
                <span class="text-gray-500 block text-xs uppercase font-semibold">Departemen</span>
                <span class="font-medium">{{ $task->department?->name ?? '-' }}</span>
            </div>
            <div>
                <span class="text-gray-500 block text-xs uppercase font-semibold">Area</span>
                <span class="font-medium">{{ $task->area?->name ?? '-' }}</span>
            </div>
            <div>
                <span class="text-gray-500 block text-xs uppercase font-semibold">Batas Waktu</span>
                <span class="font-medium">{{ \Carbon\Carbon::parse($task->due_at)->format('d-m-Y') }}</span>
            </div>
        </div>
        <div>
            <span class="text-gray-500 block text-xs uppercase font-semibold mt-2">Instruksi Tugas</span>
            <p class="text-gray-700 text-sm mt-1 bg-[#FCFBF8] border border-[#D9D6CD] p-3 rounded-sm">
                {{ $task->description ?? 'Tidak ada catatan instruksi.' }}
            </p>
        </div>
    </div>

    <form action="{{ route('task-submissions.store', $task->id) }}" method="POST" class="space-y-5 border border-gray-300 bg-white p-8 mt-4 rounded-sm">
        @csrf

        <div>
            <label for="google_drive_url" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Link Google Drive
            </label>

            <input value="{{ old('google_drive_url') }}" type="url" id="google_drive_url" name="google_drive_url" placeholder="Contoh: https://drive.google.com/..." required class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">
            @error('google_drive_url')
                <span class="py-2 text-red-500 block text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="notes" class="mb-2 block text-sm font-semibold uppercase tracking-wider text-[#16213A]">
                Catatan (Opsional)
            </label>

            <textarea id="notes" name="notes" rows="3" placeholder="Tambahkan catatan atau pesan untuk supervisor..." class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm">{{ old('notes') }}</textarea>
            @error('notes')
                <span class="py-2 text-red-500 block text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <a href="{{ route('dealer.submissions.index') }}" class="text-gray-500 py-2 px-4 hover:bg-gray-200 rounded-sm transition-all text-sm flex items-center">
                Kembali
            </a>

            <button type="submit" class="bg-[#003366] text-white py-2 px-4 hover:bg-[#014991] rounded-sm transition-all ml-2 text-sm font-semibold">
                Kirim Tugas
            </button>
        </div>
    </form>
@endsection