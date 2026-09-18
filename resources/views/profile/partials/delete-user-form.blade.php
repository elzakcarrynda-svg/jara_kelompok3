<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-[#47201B]">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm text-[#996561]">
            {{ __('Kalau akun dihapus, semua data yang terkait akan hilang permanen.') }}
        </p>
    </header>

    <button
        type="button"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-2.5 bg-[#CA734D] hover:bg-[#511E1D] text-white text-sm font-semibold rounded-xl transition shadow-md shadow-[#CA734D]/20"
    >{{ __('Hapus Akun') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-[#47201B]">
                {{ __('Yakin mau hapus akunmu?') }}
            </h2>

            <p class="mt-1 text-sm text-[#996561]">
                {{ __('Masukkan password kamu untuk konfirmasi penghapusan akun secara permanen.') }}
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">Password</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password"
                    class="block w-3/4 rounded-xl border border-[#E1D3C4] bg-white px-4 py-2.5 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" x-on:click="$dispatch('close')" class="px-5 py-2.5 text-sm font-semibold text-[#996561] hover:text-[#511E1D] transition">
                    {{ __('Batal') }}
                </button>

                <button type="submit" class="ms-3 px-6 py-2.5 bg-[#CA734D] hover:bg-[#511E1D] text-white text-sm font-semibold rounded-xl transition shadow-md shadow-[#CA734D]/20">
                    {{ __('Hapus Akun') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
