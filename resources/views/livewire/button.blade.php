<div>
    <div class="relative">
        <i class="fas fa-user-circle fa-2x bold-gray hover:bold-white cursor-pointer" wire:click="button"></i>
        <div class="absolute right-0 w-36">
            @if($button)
            <div class="grad-amber rounded shadow-lg hover:shadow-md px-2 py-2">
                @auth()
                <ul class="space-y-3">
                    <li class="flex justify-between bold-white hover:bold-gray item-center">
                        <a href="{{ route("connexion") }} " class="">
                            {{ Auth::user()->pseudo }} </a>
                        <i class="far fa-user-circle mt-1"></i>
                    </li>
                    <li class="flex justify-between bold-white hover:bold-gray item-center">
                        <a href="{{ route("inscrire") }} " class="">Parametre</a>
                        <i class="fas fa-cog mt-1"></i>
                    </li>
                    <li class="flex justify-between bold-white hover:bold-gray item-center">
                        <a href="{{ route("admin") }}" class="">Signal</a>
                        <i class="fas fa-user-md mt-1"></i>
                    </li>
                    <li class="flex justify-between bold-white hover:bold-gray item-center">
                        <button wire:click.prevent="sortie({{ Auth::id() }}) ">Sortie</button>
                        <i class="fas fa-power-off mt-1"></i>
                    </li>
                </ul>
                @else
                <ul class="space-y-3">
                    <li class="flex justify-between bold-white hover:bold-gray item-center">
                        <a href="{{ route("connexion") }} " class="">Connexion</a>
                        <i class="fas fa-sign-in-alt mt-1"></i>
                    </li>
                    <li class="flex justify-between bold-white hover:bold-gray item-center">
                        <a href="{{ route("inscrire") }} " class="">Inscrire</a>
                        <i class="fas fa-sign-in-alt mt-1"></i>
                    </li>
                    <li class="flex justify-between bold-white hover:bold-gray item-center">
                        <a href="{{ route("admin") }}" class="">Admin</a>
                        <i class="fas fa-user-md mt-1"></i>
                    </li>
                    @if($acceuil)
                    <li class="flex justify-between bold-white hover:bold-gray item-center">
                        <a href="/" class="">Acceuil</a>
                        <i class="fas fa-home mt-1"></i>
                    </li>
                    @endif
                </ul>
                @endauth
            </div>
            @else
            @endif
        </div>
    </div>
</div>
