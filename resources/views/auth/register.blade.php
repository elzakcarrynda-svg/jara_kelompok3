<x-guest-layout>
    <div class="mb-8 lg:hidden">
        <h1 class="text-2xl font-extrabold text-[#47201B]">JARA</h1>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-[#47201B]">Buat akun baru</h2>
        <p class="text-sm text-[#996561] mt-1">Daftar dulu supaya bisa masuk ke sistem</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-[#47201B] mb-1.5">Nama</label>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-3 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                placeholder="Nama lengkap"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-[#47201B] mb-1.5">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autocomplete="username"
                class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-3 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                placeholder="nama@email.com"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-semibold text-[#47201B] mb-1.5">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-3 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-[#47201B] mb-1.5">Konfirmasi Password</label>
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-3 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button
            type="submit"
            class="w-full bg-[#47201B] hover:bg-[#511E1D] text-white font-semibold py-3 rounded-xl transition shadow-md shadow-[#47201B]/20"
        >
            {{ __('Daftar') }}
        </button>

        <p class="text-center text-sm text-[#996561] pt-2">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-semibold text-[#CA734D] hover:text-[#511E1D] transition">
                Masuk di sini
            </a>
        </p>
    </form>
</x-guest-layout>
