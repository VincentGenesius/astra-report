<header class="bg-[#003366] text-white">
    <div class="mx-auto flex max-w-5xl items-center justify-between p-4">
        <a href="#" class="text-2xl font-bold"><i>Astra Report</i></a>

        <nav class="gap-8 md:flex">
            <a href="{{ route('dealers.index') }}" class="text-gray-300 hover:text-white transition-all">Dealer</a>
            <a href="{{ route('departments.index') }}" class="text-gray-300 hover:text-white transition-all">Departemen</a>
            <a href="#" class="text-gray-300 hover:text-white transition-all">Area</a>
            <a href="#" class="text-gray-300 hover:text-white transition-all">Tugas</a>
            <a href="#" class="text-gray-300 hover:text-white transition-all">Pemeriksaan Tugas</a>
        </nav>

        <div class="flex flex-col items-end">
            <span class="font-bold">Your name</span>
            <span class="text-sm opacity-70">Supervisor</span>
        </div>
    </div>
</header>