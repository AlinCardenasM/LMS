<!-- Calirficación -->
<div class="mt-2">
    <x-input-label for="score" value="Puntuación" />
    <x-text-input id="score" name="score" type="number" class="block mt-1 " />
    <x-input-error :messages="$errors->get('score')" />
</div>

<!-- TÍTULO -->
<div class="mt-2">
    <x-input-label for="feedback" value="Comentario" />
    <x-text-input id="feedback" name="feedback" type="text" class="block mt-1 w-full" />
    <x-input-error :messages="$errors->get('feedback')" />
</div>

<!-- BOTÓN -->
<div class="mt-6 flex justify-end">
    <x-primary-button>
        Calificar
    </x-primary-button>
</div>