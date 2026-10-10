@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="font-bold text-2xl text-[#003366]">Pemeriksaan Tugas Dealer</h1>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="border border-gray-300 bg-white rounded-sm mt-4 shadow-sm overflow-hidden">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-300 uppercase tracking-wider text-gray-500 bg-gray-50">
                        <th class="px-5 py-3 font-semibold">No.</th>
                        <th class="py-3 font-semibold">Judul Tugas</th>
                        <th class="py-3 font-semibold">Dealer</th>
                        <th class="py-3 font-semibold">Tanggal Pengumpulan</th>
                        <th class="py-3 font-semibold">Link Drive</th>
                        <th class="py-3 font-semibold">Status</th>
                        <th class="py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-[#16213A] divide-y">
                    @forelse ($submissions as $sub)
                        <tr>
                            <td class="px-5 py-3">{{ $loop->iteration }}</td>
                            <td class="py-3 text-[#003366] font-semibold">{{ $sub->task?->title ?? '-' }}</td>
                            <td class="py-3 font-medium">{{ $sub->dealer?->name ?? '-' }}</td>
                            <td class="py-3">{{ $sub->submitted_at }}</td>
                            <td class="py-3 text-gray-600 text-xs max-w-xs truncate">
                                <a href="{{ $sub->google_drive_url }}" target="_blank"
                                    class="text-blue-600 hover:underline flex items-center gap-1 font-medium">
                                    Buka Drive ↗
                                </a>
                            </td>
                            <td class="py-3">
                                @if($sub->status === 'pending')
                                    <span
                                        class="px-2.5 py-1 text-xs font-semibold text-yellow-700 bg-yellow-100 rounded-full">Menunggu</span>
                                @elseif($sub->status === 'revision')
                                    <span
                                        class="px-2.5 py-1 text-xs font-semibold text-orange-700 bg-orange-100 rounded-full">Revisi</span>
                                @elseif($sub->status === 'approved')
                                    <span
                                        class="px-2.5 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Disetujui</span>
                                @elseif($sub->status === 'rejected')
                                    <span
                                        class="px-2.5 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Ditolak</span>
                                @endif
                            </td>
                            <td class="pr-3 py-3 text-center">
                                <a href="" class="text-green-500 hover:text-green-700">
                                    Lihat Tugas
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center p-6 text-gray-400">Belum ada tugas yang dikumpulkan oleh dealer.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection