<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Configuración de la institución
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-2xl mx-auto">

            <div class="bg-white rounded-xl shadow p-8">

                <form method="POST"
                      action="{{ route('settings.update', $setting) }}"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- Logo --}}
                    <div class="flex flex-col items-center">

                        <div class="w-36 h-36 rounded-full overflow-hidden border-4 border-gray-200">

                            <img
                                id="preview"
                                src="{{ asset($setting->image) }}"
                                class="w-full h-full object-cover">

                        </div>

                        <label
                            for="image"
                            class="mt-5 px-5 py-2 bg-blue-600 text-white rounded-lg cursor-pointer hover:bg-blue-700">

                            Cambiar imagen

                        </label>

                        <input
                            id="image"
                            type="file"
                            name="image"
                            accept="image/*"
                            class="hidden">

                        @error('image')
                            <p class="text-red-600 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                        <p class="text-sm text-gray-500 mt-2">
                            Si no seleccionas una imagen, se conservará la actual.
                        </p>

                    </div>

                    {{-- Nombre --}}
                    <div class="mt-10">

                        <label
                            for="company_name"
                            class="block font-medium mb-2">

                            Nombre de la institución

                        </label>

                        <input
                            id="company_name"
                            type="text"
                            name="company_name"
                            value="{{ old('company_name', $setting->company_name) }}"
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                        @error('company_name')
                            <p class="text-red-600 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- Botones --}}
                    <div class="flex justify-end gap-3 mt-8">

                        <a
                            href="{{ url()->previous() }}"
                            class="px-5 py-2 rounded-lg border hover:bg-gray-100">

                            Cancelar

                        </a>

                        <button
                            type="submit"
                            class="px-5 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">

                            Guardar cambios

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <script>
        const input = document.getElementById('image');
        const preview = document.getElementById('preview');

        input.addEventListener('change', function () {

            const file = this.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
            }

        });
    </script>

</x-app-layout>