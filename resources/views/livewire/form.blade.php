<div>
    @if($form)
    <div class="px-2 py-2">
        <div class="grad-yellow rounded px-2 py-2">
            <div class="flex justify-end px-2 py-2">
                <i class="fas fa-window-close cursor-pointer bold-gray" wire:click.prevent="closeTsena"></i>
            </div>
            <div class="py-2 px-2">
                <p class="comic text-center">Publication d'article...</p>
            </div>
            <div class="py-2 py-2">
                <form action="" wire:submit.prevent="article" class="space-y-3">
                    @csrf
                    <div class="relative">
                        <input type="text" class="input w-full" name="nom" autocomplete="off" wire:model="nom" placeholder="entre votre model article">
                        <i class="fas fa-suitcase bold-gray absolute top-3 left-4"></i>
                        @error("nom")
                        <p class="indent-4 text-red-500 font-bold indent-8">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative">
                        <input type="text" class="input w-full" name="model" autocomplete="off" wire:model="model" placeholder="entre votre model article">
                        <i class="fas fa-suitcase bold-gray absolute top-3 left-4"></i>
                        @error("model")
                        <p class="indent-4 text-red-500 font-bold indent-8">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-3 space-x-2">
                        <div class="relative col-span-2">
                            <input type="text" class="input w-full" name="prix" autocomplete="off" wire:model="prix" placeholder="entre prix d'article">
                            <i class="fas fa-suitcase bold-gray absolute top-3 left-4"></i>
                            @error("prix")
                            <p class="indent-4 text-red-500 font-bold indent-8">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <select name="billet" class="input w-full" wire:model="billet" id="">
                                <option>....</option>
                                <option value="ARIARY">ARIARY</option>
                                <option value="DOLLAR">DOLLAR</option>
                                <option value="EURO">EURO</option>
                            </select>
                            @error("billet")
                            <p class="indent-4 text-red-500 font-bold indent-8">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="relative">
                        <input type="text" class="input w-full" name="stock" autocomplete="off" wire:model="stock" placeholder="entre votre nombre stok">
                        <i class="fas fa-suitcase bold-gray absolute top-3 left-4"></i>
                        @error("stock")
                        <p class="indent-4 text-red-500 font-bold indent-8">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="px-2 relative items-center">
                        <textarea class="input1 w-full h-32" nom="descipt" wire:model="descipt"></textarea>
                        <i class="fas fa-tags bold-gray absolute left-4 top-12"></i>
                        @error("descipt")
                        <p class="indent-4 text-red-500 font-bold indent-8">
                            {{str_replace("descipt","desciption",$message)}}</p>
                        @enderror
                    </div>
                    <div class="px-2 flex justify-end">
                        <input type="file" name="file" wire:model="file" accept="image/*">
                    </div>
                    <div class="flex justify-end px-2 py-2">
                        <button class="btn bold-gray hover:bold-white grad-blue px-2 py-1">Ajouter
                            <i class="fas fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="flex items-center justify-center h-32 px-2 py-2">
        <div class="flex space-x-4 px-2">
            <div>
                <button class="px-2 py-1 grad-yellow hover:grad-amber bold-gray hover:bold-white rounded">Publication</button>
            </div>
            <div>
                <button class="px-2 py-1 grad-yellow hover:grad-amber bold-gray hover:bold-white rounded">Vente</button>
            </div>
            <div>
                <button class="px-2 py-1 grad-yellow hover:grad-amber bold-gray hover:bold-white rounded">Offre et Emploi</button>
            </div>
        </div>
    </div>
    @endif
</div>
