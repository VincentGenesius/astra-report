@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="max-w-3xl mx-auto space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-2xl text-[#003366]">Form Pengumpulan Tugas</h1>
        </div>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="bg-white border border-gray-300 p-6 rounded-sm space-y-3 shadow-sm">
            <h2 class="text-lg font-bold text-[#003366] border-b pb-2">{{ $task->title }}</h2>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <span class="text-gray-500 block">Departemen:</span>
                    <span class="font-medium text-gray-800">{{ $task->department?->name ?? '-' }}</span>
                </div>
                <div>
                    <span class="text-gray-500 block">Area:</span>
                    <span class="font-medium text-gray-800">{{ $task->area?->name ?? '-' }}</span>
                </div>
                <div>
                    <span class="text-gray-500 block">Batas Waktu:</span>
                    <span
                        class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($task->due_at)->format('d M Y') }}</span>
                </div>
                <div>
                    <span class="text-gray-500 block">Pembuat Tugas:</span>
                    <span class="font-medium text-gray-800">{{ $task->creator?->name ?? '-' }}</span>
                </div>
            </div>
            <div>
                <span class="text-gray-500 block text-sm mt-2">Instruksi Tugas:</span>
                <p class="text-gray-700 text-sm mt-1 bg-gray-50 p-3 rounded">
                    {{ $task->description ?? 'Tidak ada catatan instruksi.' }}
                </p>
            </div>
            <div>
                <span class="text-gray-500 block text-xs uppercase font-semibold">Status Pengumpulan</span>
                <span class="font-semibold uppercase text-xs px-2 py-1 rounded bg-gray-100 inline-block">
                    {{ $submission ? $submission->status_label : 'Belum Dikumpulkan' }}
                </span>
            </div>
        </div>

        @php
            // Cek apakah form boleh diedit
            $isEditable = !$submission || $submission->status === 'revision';
        @endphp

        @if($submission && $submission->status === 'pending')
            <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded-sm text-sm mt-4">
                Tugas ini sudah dikumpulkan dan sedang menunggu pemeriksaan oleh supervisor. Data tidak dapat diubah saat ini.
            </div>
        @elseif($submission && $submission->status === 'approved')
            <div class="bg-green-50 border border-green-200 text-green-800 p-4 rounded-sm text-sm mt-4">
                Tugas ini telah <strong>Disetujui</strong> oleh supervisor. Data pengumpulan bersifat permanen dan tidak dapat
                diubah.
            </div>
        @elseif($submission && $submission->status === 'rejected')
            <div class="bg-red-50 border border-red-200 text-red-800 p-4 rounded-sm text-sm mt-4">
                Tugas ini telah <strong>Ditolak</strong> oleh supervisor. Anda tidak dapat melakukan pengiriman ulang.
            </div>
        @elseif($submission && $submission->status === 'revision')
            <div class="bg-orange-50 border border-orange-200 text-orange-800 p-4 rounded-sm text-sm mt-4">
                Supervisor meminta <strong>Revisi</strong> pada tugas ini. Silakan perbaiki data di bawah dan kirim ulang.
            </div>
        @endif

        <form action="{{ route('task-submissions.store', $task->id) }}" method="POST"
            class="bg-white border border-gray-300 p-6 rounded-sm space-y-4 shadow-sm">
            @csrf

            <div>
                <label for="google_drive_url"
                    class="block text-sm font-semibold mb-1 uppercase tracking-wider text-[#16213A]">
                    Link Google Drive <span class="text-red-500">*</span>
                </label>
                <input value="{{ old('google_drive_url', $submission?->google_drive_url) }}" type="url" id="google_drive_url" name="google_drive_url" placeholder="Contoh: https://drive.google.com/..." {{ $isEditable ? 'required' : 'disabled' }} class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm {{ !$isEditable ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}">
                @error('google_drive_url')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="notes" class="block text-sm font-semibold mb-1 uppercase tracking-wider text-[#16213A]">
                    Catatan (Opsional)
                </label>
                <textarea id="notes" name="notes" rows="3" placeholder="Tambahkan catatan atau pesan untuk supervisor..." {{ $isEditable ? '' : 'disabled' }} class="w-full border border-[#D9D6CD] bg-[#FCFBF8] p-3 text-sm focus:border-[#003366] focus:outline-none rounded-sm {{ !$isEditable ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' }}">{{ old('notes', $submission?->notes) }}</textarea>
                @error('notes')
                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end pt-2">
                <a href="{{ route('task-submissions.index') }}"
                    class="text-gray-500 py-2 px-4 hover:bg-gray-200 rounded-sm transition-all text-sm flex items-center">
                    Kembali
                </a>

                @if($isEditable)
                <button type="submit"
                    class="bg-[#003366] text-white py-2 px-4 hover:bg-[#014991] rounded-sm transition-all ml-2 text-sm font-semibold">
                    Kirim Tugas
                </button>
                @endif
            </div>
        </form>
    </div>
@endsection