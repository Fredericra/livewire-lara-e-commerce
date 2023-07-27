<div>
    <div class="grid-media py-5 px-10 gap-20">
        <div class="col-span-4"></div>
        <div class="col-span-4 py-2 grad-blue rounded shadow-lg hover:shadow-2xl">
            <div class="flex justify-center py-2">
                <h2 class="comic bold-white">Inscrire</h2>
            </div>
            <div class="py-2 px-2">
                <form action="" wire:submit.prevent="inscrire" class="space-y-3 px-5">
                    <div class="relative">
                        <input autocomplete="off" type="text" name="pseudo" wire:model="pseudo" class="input w-full" placeholder="entre votre pseudo">
                        <i class="far fa-user-circle bold-gray absolute top-3 left-4"></i>
                        @error("pseudo")
                        <p class="smal indent-12 text-red-600 font-bold">{{ $message }}</p>
                        @endif
                    </div>
                    <div class="relative">
                        <input autocomplete="off" wire:model="email" type="text" name="email" class="input w-full" placeholder="entre votre email">
                        <i class="far fa-envelope bold-gray absolute top-3 left-4"></i>
                        @error("email")
                        <p class="smal indent-12 text-red-600 font-bold">{{ $message }}</p>
                        @endif
                    </div>
                    <div class="relative">
                        <input autocomplete="off" @if($eye) type="text" @else type="password" @endif name="password" wire:model="password" class="input w-full" placeholder="entre votre mots de pass">
                        <i class="fas fa-lock bold-gray absolute top-3 left-4"></i>
                        <i class="far @if($eye) fa-eye @else fa-eye-slash @endif bold-gray absolute top-3 right-4 cursor-pointer" wire:click.prevent="eye"></i>
                        @error("password")
                        <p class="smal indent-12 text-red-600 font-bold">{{ $message }}</p>
                        @endif
                    </div>
                    <div class="relative">
                        <input autocomplete="off" @if($eye1) type="text" @else type="password" @endif name="confirm" wire:model="confirm" class="input w-full" placeholder="confirmer mots de pass">
                        <i class="fas fa-lock bold-gray absolute top-3 left-4"></i>
                        <i class="far @if($eye1) fa-eye @else  fa-eye-slash @endif  bold-gray absolute top-3 right-4 cursor-pointer" wire:click.prevent="eye1"></i>
                        @error("confirm")
                        <p class="smal indent-12 text-red-600 font-bold">{{ $message }}</p>
                        @endif
                    </div>
                    <div class="px-2 py-2">
                         @error("check")
                        <p class="indent-2smal font-bold text-red-700">{{ $message }}</p>
                        @endif
                        <label for="" class="flex justify-start space-x-2">
                            <input type="checkbox" wire:model="check" >
                            <p class="bold-gray">accepter les contrat 
                                <a href="" class="hover:bold-white"> confidentiel</a></p>
                        </label>
                       
                    </div>
                    <div class="px-4 py-2">
                        <button class="@if($button) cursor-not-allowed @endif btn grad-yellow hover:grad-blue bold-gray hover:bold-white" @if($button) disabled @endif >
                            Inscrire
                            <i class="fas fa-user-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-span-4"></div>
    </div>
</div>
