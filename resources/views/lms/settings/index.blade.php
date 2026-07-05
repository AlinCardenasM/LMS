<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Configuración de la institución
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-2xl mx-auto">

            <div class="bg-white rounded-xl shadow p-8">

                <form method="POST" action="{{ route('settings.update', $setting) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('lms.settings.form') 
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