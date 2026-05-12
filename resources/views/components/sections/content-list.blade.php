@props(['content'])
<div class="flex items-center justify-between p-4 border-b">

    <div class="flex items-center gap-3">

        <div class="bg-gray-100 p-3 rounded-full">
            <ion-icon name="document-text-outline"></ion-icon>
        </div>

        <div>
            <p class="font-medium">
                {{ $content->title }}
            </p>

            <p class="text-sm text-gray-500">
                Publicado:
                {{ $content->created_at->format('d M') }}
            </p>
        </div>

    </div>

</div>