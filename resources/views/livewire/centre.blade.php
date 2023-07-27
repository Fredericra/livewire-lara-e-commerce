<div class="">
    @if(Route::is("acceuil"))
    @else
    @if(!$premuim AND !$etsena)
    <div class="px-4 py-2">
        <div class="grad-yellow px-2 py-2 rounded">
            <div class="flex py-2 px-2 justify-end">
                <i class="fas fa-window-close cursor-pointer" wire:click="close"></i>
            </div>
            <div class="px-2 py-2">
                <h3 class="comic bold-gray text-center">Rempliz le formulaire</h3>
            </div>
            <div class="px-2 py-2">
                <form action="" class="space-y-3" wire:submit.prevent="premuim2">
                    <div class="relative">
                        <input type="text" class="input w-full" name="compte" autocomplete="off" placeholder="entre votre nom compte bancaire" wire:model="compte">
                        <i class="fas fa-university bold-gray absolute top-3 left-4"></i>
                        @error("compte")
                        <p class="smal indent-8">{{ str_replace("compte","nom de bancaire",$message) }}</p>
                        @enderror
                    </div>
                    <div class="relative z">
                        <input type="text" class="input w-full" name="code" autocomplete="off" placeholder="entre votre nom compte bancaire" wire:model="code">
                        <i class="fas fa-lock bold-gray absolute top-3 left-4"></i>
                        @error("code")
                        <p class="smal indent-8">{{ str_replace("code","code bancaire",$message) }}</p>
                        @enderror
                    </div>
                    <div class="px-2">
                        <label for="">
                            <input type="checkbox" wire:model="check" class="text-slate-200 font-bold"> j'accepter les <a href="" class="bold-gray">terme</a>
                        </label>
                    </div>
                    <div class="flex justify-end px-2">
                        <button class="btn-full bold-white px-2 py-1 grad-yellow hover:grad-blue ">
                            Premuim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    @endif
</div>
