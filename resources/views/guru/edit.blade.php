<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Status</h2>
            <form action="{{ route('guru.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Assuming you are using PUT for updates -->
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                      <span class="label-text">Status</span>
                    </div>
                    <select name="status" class="select select-bordered">
                      <option disabled>{{ $siswa->status }}</option>
                      <option value="Sedang dalam Tinjauan" {{ $siswa->status == 'Sedang dalam Tinjauan' ? 'selected' : '' }}>Sedang dalam Tinjauan</option>
                      <option value="Done" {{ $siswa->status == 'Done' ? 'selected' : '' }}>Done</option>
                    </select>
                </label>
                <button type="submit" name="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Update
                </button>
            </form>
        </div>
    </section>
</x-app-layout>