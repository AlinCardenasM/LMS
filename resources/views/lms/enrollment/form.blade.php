<!-- TÍTULO -->
<div class="mt-2">
    <x-input-label for="access_code" value="Código de acceso" />
    <x-text-input id="access_code" name="access_code" type="text" class="block mt-1 w-full" />
    <x-input-error :messages="$errors->get('access_code')" />
</div>

<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button>
        Unirme
    </x-primary-button>
</div>