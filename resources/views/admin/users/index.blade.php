<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#47201B] leading-tight">
            Manajemen User
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F8F7F7] overflow-hidden shadow-sm rounded-2xl border border-[#E1D3C4] p-6">

                @if (session('success'))
                    <div class="mb-5 p-4 bg-[#F3EFE8] border border-[#996561]/30 text-[#511E1D] rounded-xl text-sm font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-[#47201B]">Daftar Pengguna</h3>
                        <p class="text-sm text-[#996561]">Kelola akun pengguna dalam sistem</p>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#47201B] hover:bg-[#511E1D] text-white text-sm font-semibold rounded-xl transition shadow-md shadow-[#47201B]/20">
                        + Tambah User
                    </a>
                </div>

                <div class="overflow-x-auto rounded-xl border border-[#E1D3C4]">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-[#E1D3C4]/40">
                                <th class="p-3.5 text-sm font-semibold text-[#47201B]">Nama</th>
                                <th class="p-3.5 text-sm font-semibold text-[#47201B]">Email</th>
                                <th class="p-3.5 text-sm font-semibold text-[#47201B]">Role</th>
                                <th class="p-3.5 text-sm font-semibold text-[#47201B] text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#E1D3C4]">
                            @foreach ($users as $user)
                                <tr class="bg-white hover:bg-[#F3EFE8]/60 transition">
                                    <td class="p-3.5 text-sm text-[#47201B] font-medium">{{ $user->name }}</td>
                                    <td class="p-3.5 text-sm text-[#996561]">{{ $user->email }}</td>
                                    <td class="p-3.5">
                                        <span @class([
                                            'inline-block px-3 py-1 text-xs font-semibold rounded-full',
                                            'bg-[#CA734D]/15 text-[#CA734D]' => $user->role === 'admin',
                                            'bg-[#996561]/15 text-[#996561]' => $user->role !== 'admin',
                                        ])>
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="p-3.5 text-right">
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm font-semibold text-[#CA734D] hover:text-[#511E1D] transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($users->isEmpty())
                                <tr>
                                    <td colspan="4" class="p-6 text-center text-sm text-[#996561]">
                                        Belum ada pengguna terdaftar.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>