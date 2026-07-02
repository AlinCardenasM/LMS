<!-- TÍTULO -->
<div class="mt-2">
    <x-input-label for="company_name" value="Nombre de la organización" />
    <x-text-input id="company_name" name="company_name" type="text" class="block mt-1 w-full" value="{{ old('company_name', $setting ->company_name) }}"  required/>
    <x-input-error :messages="$errors->get('company_name')" />
</div>

<!-- IMAGEN -->
<div class="mt-4">
    <x-input-label for="image" value="Logo de la organización" />
    <x-text-input id="image" name="image" type="file" class="block mt-1 w-full" />
    <x-input-error :messages="$errors->get('image')" />
</div>


<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button> Guardar </x-primary-button>
</div>