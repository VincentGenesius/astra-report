<header class="bg-[#003366] text-white">
    <div class="mx-auto flex max-w-5xl items-center justify-between p-4">
        <a href="#" class="text-2xl font-bold"><i>Astra Report</i></a>

        <nav class="gap-8 md:flex">
            <a href="{{ route('dealers.index') }}" class="text-gray-300 hover:text-white transition-all">Dealer</a>
            <a href="{{ route('departments.index') }}" class="text-gray-300 hover:text-white transition-all">Departemen</a>
            <a href="{{ route('areas.index') }}" class="text-gray-300 hover:text-white transition-all">Area</a>
            <a href="{{ route('tasks.index') }}" class="text-gray-300 hover:text-white transition-all">Tugas</a>
            <a href="#" class="text-gray-300 hover:text-white transition-all">Pemeriksaan Tugas</a>
        </nav>

        <div class="flex items-center gap-4">
            <div class="flex flex-col items-end">
                <span class="font-bold">{{ auth()->user()->name }}</span>
                <span class="text-sm uppercase opacity-70">{{ auth()->user()->role }}</span>
            </div>

            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Anda yakin ingin keluar?')">
                @csrf
                <button type="submit" class="bg-[#d10000] text-white hover:bg-[#9b0000] transition-all rounded-sm px-1 py-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H8.25" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</header>