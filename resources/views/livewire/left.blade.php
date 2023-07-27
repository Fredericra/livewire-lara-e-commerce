<div class="space-y-3 ">
    <div class="rounded @if($premuim) grad-sky @else grad-yellow @endif  shadow-lg hover:shadow-md px-4 py-4">
        <div class="flex justify-between px-2 h-10 items-center">
            <p class="bold-gray">Utilisateur</p>
            <div class="flex justify-between px-2 space-x-5">
                <i class="far @if($affiche) fa-toggle-on @else fa-toggle-off @endif bold-gray fa-lg cursor-pointer" wire:click.prevent="affiche"></i>
                <i class="fas fa-cog fa-lg"></i>
            </div>
        </div>
        <hr class="px-2 py-2">
        @if($affiche)
        <div class="py-4">
            <ul class="space-y-3 px-10">
                <li class="flex justify-between items-center">
                    <p class="@if($tsena) bold-white @else bold-gray @endif ">E-tsena</p>
                    <i class="far @if($tsena) fa-toggle-on @else fa-toggle-off @endif bold-gray fa-lg cursor-pointer" wire:click.prevent="tsena"></i>
                </li>
                <li class="flex justify-between items-center">
                    <p class="@if($pub) bold-white @else bold-gray @endif ">Publication</p>
                    <i class="far @if($pub) fa-toggle-on @else fa-toggle-off @endif bold-gray fa-lg cursor-pointer" wire:click.prevent="pub"></i>
                </li>
                <li class="flex justify-between items-center">
                    <p class="@if($offre) bold-white @else bold-gray @endif ">Offre</p>
                    <i class="far @if($offre) fa-toggle-on @else fa-toggle-off @endif bold-gray fa-lg cursor-pointer" wire:click.prevent="offre"></i>
                </li>
                <li class="flex justify-between items-center">
                    <p class="@if($emploi) bold-white @else bold-gray @endif ">Emploi</p>
                    <i class="far @if($emploi) fa-toggle-on @else fa-toggle-off @endif bold-gray fa-lg cursor-pointer" wire:click.prevent="emploi"></i>
                </li>
                <li class="flex justify-between items-center">
                    <p class="@if($premuim) bold-white @else bold-gray @endif ">@if($premuim) Premuim @else Gratuit @endif</p>
                    <i class="far @if($premuim) fa-toggle-on @else fa-toggle-off @endif bold-gray fa-lg cursor-pointer" wire:click.prevent="premuim"></i>
                </li>
            </ul>
        </div>
        @endif
    </div>
    <div class="px-2 py-2 rounded grad-yellow shadow-lg hover:shadow-md sticky-left">
        <div class="">
            <div class="flex justify-between px-2 py-2">
                <h3 class="comic bold-gray">Notification</h3>
                <div class="flex space-x-2 items-center">
                    <i class="far fa-bell font-white cursor-pointer"></i>
                </div>
            </div>
            @if($notification)
            <div class="flex justify-center items-center h-20 bg-gray-300 rounded">
                <p class="bold-gray comic">{!! $message !!} </p>
            </div>
            @endif
        </div>
    </div>
</div>
