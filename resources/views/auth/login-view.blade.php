@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="text-[#003366] flex items-center justify-center min-h-[80vh]">
        <div class="w-full max-w-md p-10 bg-white rounded-2xl shadow-lg border border-gray-100">
            <div class="flex flex-col items-center mb-6">
                <h1 class="text-3xl font-bold mb-2">LOGIN</h1>
                <p class="text-[#003366] text-center text-lg">Selamat datang di <b><i>Astra Report</i></b>!</p>
                <p class="text-[#003366] text-center text-sm"><i>Masuk ke akun anda untuk melanjutkan.</i></p>
            </div>

            <form action="{{ route('login-post') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block mb-2 font-semibold">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email anda" required
                        class="w-full p-3 border border-gray-300 rounded-md text-[#003366] focus:outline-none focus:ring-1 focus:ring-[#014991]">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-2 font-semibold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan kata sandi anda" required
                        class="w-full p-3 border border-gray-300 rounded-md text-[#003366] focus:outline-none focus:ring-1 focus:ring-[#014991]">
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-[#003366] hover:bg-[#02468a] py-3 mt-2 rounded-md font-semibold text-white transition-colors">Masuk</button>
            </form>

        </div>
    </div>
@endsection