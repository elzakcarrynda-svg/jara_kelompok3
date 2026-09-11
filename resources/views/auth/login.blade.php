<x-guest-layout>
    <div class="mb-8 lg:hidden">
        <h1 class="text-2xl font-extrabold text-[#47201B]">JARA</h1>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl font-bold text-[#47201B]">Masuk ke akunmu</h2>
        <p class="text-sm text-[#996561] mt-1">Lanjutkan mengelola tugasmu hari ini</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-[#47201B] mb-1.5">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
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
                autocomplete="current-password"
                class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-3 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-[#E1D3C4] text-[#CA734D] focus:ring-[#CA734D]"
                />
                <span class="ms-2 text-sm text-[#996561]">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm font-medium text-[#CA734D] hover:text-[#511E1D] transition">
                    {{ __('Lupa password?') }}
                </a>
            @endif
        </div>

        <button
            type="submit"
            class="w-full bg-[#47201B] hover:bg-[#511E1D] text-white font-semibold py-3 rounded-xl transition shadow-md shadow-[#47201B]/20"
        >
            {{ __('Masuk') }}
        </button>

        <p class="text-center text-sm text-[#996561] pt-2">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-semibold text-[#CA734D] hover:text-[#511E1D] transition">
                Daftar di sini
            </a>
        </p>
    </form>
</x-guest-layout>