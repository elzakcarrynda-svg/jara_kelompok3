<x-app-layout>

<div class="min-h-screen bg-[#F8F7F7] p-6">

    <div class="max-w-2xl mx-auto">

        <div class="mb-6">

            <h1 class="text-3xl font-bold text-[#47201B]">
                Buat Project Baru
            </h1>

            <p class="text-[#996561] mt-2">
                Buat project untuk mengelompokkan tugas kamu.
            </p>

        </div>


        @if ($errors->any())

            <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-5">

                <ul class="list-disc pl-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <div class="bg-white rounded-2xl shadow-md p-6">

            <form
                method="POST"
                action="{{ route('projects.store') }}"
            >

                @csrf


                <div class="mb-5">

                    <label class="block font-semibold text-[#47201B] mb-2">
                        Nama Project
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3"
                        placeholder="Contoh: Tugas Kuliah"
                    >

                </div>


                <div class="mb-5">

                    <label class="block font-semibold text-[#47201B] mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3"
                        placeholder="Deskripsi project..."
                    >{{ old('description') }}</textarea>

                </div>


                <div class="flex gap-3">

                    <a
                        href="{{ route('projects.index') }}"
                        class="px-5 py-3 rounded-xl bg-gray-200"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-3 rounded-xl bg-[#511E1D] text-white"
                    >
                        Buat Project
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>