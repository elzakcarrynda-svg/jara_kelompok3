<x-app-layout>

    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#47201B] leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Welcome Card --}}
            <div class="bg-[#F8F7F7] shadow-sm rounded-2xl border border-[#E1D3C4] p-8 mb-6">

                <p class="text-sm font-medium text-[#996561]">
                    Selamat datang kembali,
                </p>

                <h3 class="text-2xl font-bold text-[#47201B] mt-1">
                    {{ Auth::user()->name }}
                </h3>

                <span @class([
                    'inline-block mt-4 px-3 py-1 text-xs font-semibold rounded-full',
                    'bg-[#CA734D]/15 text-[#CA734D]' => Auth::user()->role === 'admin',
                    'bg-[#996561]/15 text-[#996561]' => Auth::user()->role !== 'admin',
                ])>
                    {{ ucfirst(Auth::user()->role) }}
                </span>

            </div>


            {{-- Admin --}}
            @if (Auth::user()->role === 'admin')

                <div class="grid gap-6 sm:grid-cols-2">

                    <a href="{{ route('admin.users.index') }}"
                        class="bg-white shadow-sm rounded-2xl border border-[#E1D3C4]
                               p-6 hover:border-[#CA734D] hover:shadow-md transition">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-xl bg-[#47201B]
                                        flex items-center justify-center shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 19a4 4 0 00-8 0M11 11a3 3 0 100-6 3 3 0 000 6zm8 8a4 4 0 00-3-3.87M17 5a3 3 0 010 6" />

                                </svg>

                            </div>

                            <div>
                                <h4 class="font-bold text-[#47201B]">
                                    Manajemen User
                                </h4>

                                <p class="text-sm text-[#996561] mt-1">
                                    Tambah, lihat, dan hapus akun pengguna sistem.
                                </p>
                            </div>

                        </div>

                    </a>

                </div>

            @endif

        </div>
    </div>

</x-app-layout>