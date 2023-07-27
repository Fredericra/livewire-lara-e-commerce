<div>
    <div class="grid-media py-5 px-10 gap-20">
        <div class="col-span-4"></div>
        <div class="col-span-4 py-2 grad-blue rounded shadow-lg hover:shadow-2xl">
            <div class="flex justify-center py-2">
                <h2 class="comic bold-white">Connexion</h2>
            </div>
            <div class="py-2 px-2">
                <form action="" wire:submit.prevent="connexion" class="space-y-3 px-5">
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
                        <p class="smal indent-12 text-red-600 font-bold">
                            {{str_replace("password","mots de pass", $message) }}
                        </p>
                        @endif
                    </div>
                    <div class="px-2 py-2">
                        @error("check")
                        <p class="indent-2smal font-bold text-red-700">{{ $message }}</p>
                        @endif
                        <label for="" class="flex justify-start space-x-2">
                            <input type="checkbox" wire:model="check">
                            <p class="bold-gray">souvient moi
                        </label>
                    </div>
                    <div class="px-4 py-2">
                        <button class="@if($button1 || $errors->any()) cursor-not-allowed @endif btn grad-yellow hover:grad-blue bold-gray hover:bold-white" @if($button1 || $errors->any()) disabled @endif>
                            connexion
                            <i class="fas fa-user-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-span-4"></div>
    </div>
</div>
