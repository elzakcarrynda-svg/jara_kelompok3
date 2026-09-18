<section>
    <header>
        <h2 class="text-lg font-bold text-[#47201B]">
            {{ __('Ubah Password') }}
        </h2>

        <p class="mt-1 text-sm text-[#996561]">
            {{ __('Pastikan akunmu memakai password yang panjang dan acak supaya aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block text-sm font-semibold text-[#47201B] mb-1.5">Password Saat Ini</label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-2.5 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password" class="block text-sm font-semibold text-[#47201B] mb-1.5">Password Baru</label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-2.5 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-semibold text-[#47201B] mb-1.5">Konfirmasi Password</label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-2.5 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-6 py-2.5 bg-[#47201B] hover:bg-[#511E1D] text-white text-sm font-semibold rounded-xl transition shadow-md shadow-[#47201B]/20">
                {{ __('Simpan') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-[#996561]"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
