<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#47201B] leading-tight">
            Profil
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-[#F8F7F7] rounded-2xl border border-[#E1D3C4] shadow-sm p-8">

                <h3 class="text-lg font-bold text-[#47201B]">
                    Informasi Profil
                </h3>

                <p class="text-sm text-[#996561] mt-1 mb-6">
                    Informasi akun yang sedang digunakan.
                </p>

                <div class="space-y-5">

                    <div>
                        <p class="text-sm font-medium text-[#996561]">Nama</p>
                        <p class="mt-1 text-base font-semibold text-[#47201B]">
                            {{ Auth::user()->name }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-[#996561]">Email</p>
                        <p class="mt-1 text-base font-semibold text-[#47201B]">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-medium text-[#996561]">Role</p>
                        <span class="inline-block mt-1 px-3 py-1 text-xs font-semibold rounded-full bg-[#CA734D]/15 text-[#CA734D]">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </div>

                </div>

                <div class="mt-8 pt-6 border-t border-[#E1D3C4]">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="px-5 py-2.5 bg-[#47201B] hover:bg-[#511E1D] text-white text-sm font-semibold rounded-xl transition">
                            Log Out
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>