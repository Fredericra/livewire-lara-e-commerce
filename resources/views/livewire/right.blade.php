<div class="relative">
    <div class="px-2 py-2 sticky-left">
        <div class="grad-blue rounded px-2 py-2">
            <div class="flex justify-between items-center bold-white">
                <p>{{ Auth::user()->pseudo }} </p>
                <i class="fas fa-user-lock"></i>
            </div>
            <hr class="px-2 py-2">
            <div class="py-2">
                @if($premuim1)
                <div class="flex justify-between">
                <p class="indent-4 bold-white">Compte Premuim</p>
                <i class="fas fa-check-circle bold-gray"></i>
                </div>
                @else
                <p class="indent-4 bold-gray">Upgrade votre compte en premuim</p>
                @endif
            </div>
        </div>
    </div>
</div>
