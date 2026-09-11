<x-app-layout>

<div class="min-h-screen bg-[#F8F7F7] p-6">

    <div class="max-w-2xl mx-auto">

        <div class="mb-6">

            <h1 class="text-3xl font-bold text-[#47201B]">
                Buat Task Baru
            </h1>

            <p class="text-[#996561] mt-2">
                Project: {{ $project->name }}
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
                action="{{ route('tasks.store', $project) }}"
            >

                @csrf


                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Judul Task
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full border border-gray-300 rounded-xl px-4 py-3"
                        placeholder="Contoh: Membuat laporan"
                    >

                </div>


                <div class="mb-5">

                    <label class="block font-semibold mb-2">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3"
                    >{{ old('description') }}</textarea>

                </div>


                <div class="grid md:grid-cols-2 gap-4 mb-5">


                    <div>

                        <label class="block font-semibold mb-2">
                            Priority
                        </label>

                        <select
                            name="priority"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3"
                        >

                            <option value="low">
                                Low
                            </option>

                            <option value="medium" selected>
                                Medium
                            </option>

                            <option value="high">
                                High
                            </option>

                        </select>

                    </div>


                    <div>

                        <label class="block font-semibold mb-2">
                            Deadline
                        </label>

                        <input
                            type="date"
                            name="deadline"
                            value="{{ old('deadline') }}"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3"
                        >

                    </div>

                </div>


                <div class="mb-6">

                    <label class="block font-semibold mb-2">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3"
                    >

                        <option value="todo" selected>
                            Todo
                        </option>

                        <option value="doing">
                            Doing
                        </option>

                        <option value="done">
                            Done
                        </option>

                    </select>

                </div>


                <div class="flex gap-3">

                    <a
                        href="{{ route('projects.show', $project) }}"
                        class="px-5 py-3 bg-gray-200 rounded-xl"
                    >
                        Batal
                    </a>


                    <button
                        type="submit"
                        class="px-5 py-3 bg-[#511E1D] text-white rounded-xl"
                    >
                        Buat Task
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>