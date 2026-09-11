<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-[#47201B] leading-tight">
            Tambah User
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#F8F7F7] overflow-hidden shadow-sm rounded-2xl border border-[#E1D3C4] p-8">

                <div class="mb-6">
                    <h3 class="text-lg font-bold text-[#47201B]">Buat Akun Baru</h3>
                    <p class="text-sm text-[#996561]">Isi data pengguna yang ingin ditambahkan</p>
                </div>

                <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-[#47201B] mb-1.5">Nama</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-2.5 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                            placeholder="Nama lengkap">
                        @error('name') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#47201B] mb-1.5">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-2.5 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                            placeholder="nama@email.com">
                        @error('email') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#47201B] mb-1.5">Password</label>
                        <input type="password" name="password"
                            class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-2.5 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                            placeholder="••••••••">
                        @error('password') <span class="text-red-600 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#47201B] mb-1.5">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                            class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-2.5 text-[#47201B] placeholder-[#996561]/50 focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#47201B] mb-1.5">Role</label>
                        <select name="role"
                            class="block w-full rounded-xl border border-[#E1D3C4] bg-white px-4 py-2.5 text-[#47201B] focus:border-[#CA734D] focus:ring-4 focus:ring-[#CA734D]/15 focus:outline-none transition">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                        <button type="submit" class="px-6 py-2.5 bg-[#47201B] hover:bg-[#511E1D] text-white text-sm font-semibold rounded-xl transition shadow-md shadow-[#47201B]/20">
                            Simpan
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="px-6 py-2.5 text-sm font-semibold text-[#996561] hover:text-[#511E1D] transition">
                            Batal
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>