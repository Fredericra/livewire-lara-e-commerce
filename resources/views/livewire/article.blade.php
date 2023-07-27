<div>
    <div class="px-2 space-y-3">
        @foreach($article as $key => $articles)
        <div class="px-2 grad-blue shadow-lg hover:shadow-2xl rounded" wire:key="articles-{!! $key !!} ">
            <div class="flex justify-between px-2 py-2">
                <div class="flex items-center bold-gray hover:bold-blue petit space-x-2 cursor-pointer">
                    <div class="relative">
                        <i class="fas fa-user-circle fa-2x"></i>
                        @if($articles->admin->ligne)
                        <span class="h-2 w-2 rounded bg-sky-500
                         absolute -top-1 right-0"></span>
                        @endif
                    </div>
                    <span>{!! $articles->admin->pseudo !!} </span>
                </div>
                <div class="">
                    @if($articles->autre)
                    <button class="smal bold-gray hover:bold-white">E-tsena</button>
                    @endif
                </div>
                <div class="">
                    <div class="relative">
                        <i class="fas fa-list bold-gray hover:bold-blue cursor-pointer" wire:click.prevent="show({!! $articles->id !!}) "></i>
                        @if($show and $menuKey===$articles["id"])
                        <div class="absolute -right-2 w-32 py-2 py-1 bg-violet-400 rounded">
                            <div class="px-2">
                                <ul class="space-y-1 smal">
                                    @if($articles["id"]===Auth::id())
                                    <li class="bold-gray hover:bold-white flex justify-between">
                                        <button>Supprime</button>
                                        <i class="fas fa-trash"></i>
                                    </li>
                                    @endif
                                </ul>
                                <ul class="space-y-1 smal">
                                    <li class="bold-gray hover:bold-white flex justify-between">
                                        <button>Signal</button>
                                        <i class="fas fa-sign-in-alt"></i>
                                    </li>
                                </ul>
                                <ul class="space-y-1 smal">
                                    <li class="bold-gray hover:bold-white flex justify-between">
                                        <button>Cache</button>
                                        <i class="far fa-eye-slash"></i>
                                    </li>
                                </ul>
                                <ul class="space-y-1 smal">
                                    <li class="bold-gray hover:bold-white flex justify-between">
                                        <button>Consulte</button>
                                        <i class="fas fa-eye-slash"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="py-2 px-2">
                <div class="grid grid-cols-2 gap-1">
                    <div class="">
                        <ul class="space-y-2">
                            <li class="flex smal space-x-2">
                                <span class="bold-gray">Type</span>
                                <span class="indent-2 bold-white">
                                    {!! $articles->nom !!}
                                </span>
                            </li>
                            <li class="flex smal  space-x-2">
                                <span class="bold-gray">Model</span>
                                <span class="indent-2 bold-white">
                                    {!! $articles->model !!}
                                </span>
                            </li>
                            <li class="flex space-x-4 smal">
                                <span class="bold-gray">Prix</span>
                                <div class="flex justify-center items-center space-x-2">
                                    <span class="bold-white">
                                        {!! number_format($articles->prix,'3',' , ','. ') !!}
                                    </span>
                                    <span class="text-sky-400 font-bold">
                                        @if($articles->billet==="DOLLAR")
                                        <i class="fas fa-dollar fa-2x text-amber-400"></i>
                                        @elseif($articles->billet==="EURO")
                                        <i class="fas fa-euro fa-2x text-amber-400"></i>
                                        @else
                                        <i class="text-lg text-sky-400">AR</i>
                                        @endif
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="">
                    </div>
                </div>
                <div class="flex-wrap">
                   <p class="smal py-1 px-4 bold-gray">{!! $articles->descipt !!}  </p>
                </div>
                <div class="">
                    @if(count($articles->images)>0)
                    @foreach($articles->images as $images)
                    <img src="{!! Storage::url($images->image) !!} " alt="{!! $images->image !!} " class="rounded">
                    @endforeach
                    @endif
                </div>
                <div class="px-2 py-3 mt-4">
                    <div class="grid grid-cols-3">
                        <div class="flex justify-start">
                            <i class="fab fa-twitch bold-gray hover:bold-white cursor-pointer fa-lg"  wire:click.prevent="affiche({!! $articles->id !!})" ></i>
                        </div>
                        <div class="flex justify-center ">
                            <i class="fas fa-shopping-bag bold-gray hover:bold-white cursor-pointer fa-lg"
                           wire:click.prevent="buy({!! $articles->id !!}) " ></i>
                        </div>
                        <div class="flex justify-end">
                            @if(count($articles->favoris))
                            <div class="relative">
                             <i class="far fa-heart font-bold text-violet-600 animate-bounce hover:bold-white cursor-pointer fa-lg"
                          @auth() wire:click.prevent="heart({!! $articles->id !!}) " @endauth></i>
                            <p class="text-sky-600 absolute smal font-bold -top-2 -right-2">{!! count($articles->favoris) !!} </p>
                            </div>
                            @else
                            <i class="far fa-heart bold-gray hover:bold-white cursor-pointer fa-lg"
                           @auth() wire:click.prevent="heart({!! $articles->id !!})" @endauth></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @if($affiche and $menuKey===$articles->id)
            <div class="py-2 px-1 relative">
                <div class="absolute w-32 bottom-12 left-10">
                    <ul class="petit space-y-2 bg-yellow-400 rounded">
                    @foreach($mention as $mentions)
                        <li class="px-2">
                            <button class="bold-gray hover:bold-white">#{!! $mentions->pseudo !!} </button>
                        </li>
                    @endforeach
                    </ul>
                </div>
                @auth()
                <form action="" wire:submit.prevent="comment({!! $articles->id !!}) ">
                    <div class="relative petit">
                        <input type="text" name="comment" wire:model="comment" class="input1 rounded-full w-64">
                        <div class="absolute left-2 top-0">
                            <ul class="bold-gray hover: bold-white">
                                <li class="text-center">
                                    <i class="fas fa-user-circle"></i>
                                </li>
                                <li>{!! Auth::user()->pseudo !!}</li>
                            </ul>
                        </div>
                        <button class="fas fa-paper-plane fa-2x px-2 py-1 bold-gray hover:bold-white"></button>
                    </div>
                </form>
                @endauth
            </div>
            <div class="py-2 ">
                @if(count($tout)>0)
                @foreach($tout as $monde)
                <div class="border-l-2 border-gray-400 relative">
                    <span class="w-4 h-[1px] bg-gray-400 absolute leflt-0 top-4"></span>
                    <div class="grid grid-cols-12 px-1">
                        <div class="col-span-3 cursor-pointer">
                            <ul class="text-center petit bold-gray hover:bold-white">
                                <li><i class="fas fa-user-circle"></i></li>
                                <li>
                                    @if(Auth::id()===$monde->admins->id)
                                    #moi
                                    @else
                                    <span>{!! $monde->admins->pseudo !!} </span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-6 bold-gray">
                            <span class="petit indent-2">
                                {!! $monde->comment !!}
                            </span>
                        </div>
                        <div class="col-span-3">
                            <div class="flex justify-between px-3 py-4">
                                @if(Auth::id()===$monde->admins->id)
                                <i class="fas fa-trash bold-gray hover:bold-white cursor-pointer" wire:click.prevent="commentSupprime({!! $monde->id !!}) "></i>
                                @endif
                                <i class="far fa-heart bold-gray hover:bold-white cursor-pointer"></i>
                                <i class="fas fa-share bold-gray hover:bold-white cursor-pointer"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="flex justify-center items-center h-12 bg-gray-300">
                    <ul class="petit comic bold-gray">
                        <li>Soyez le premier</li>
                        <li>Aucun commentaire</li>
                    </ul>
                </div>
                @endif
            </div>
            @elseif($buy and $articles->id===$menuKey)
            <div class="py2">
                <div class="flex justify-between px-4 space-x-5 items-center h-20">
                    <div class="relative">
                        <i class="fas fa-shopping-bag bold-gray"></i>
                        <div class="absolute -top-2 -right-2">
                            <span class=" items-center bold-gray">0</span>
                        </div>
                    </div>
                    <button class="bg-sky-500 px-3 py-1 rounded bold-gray hover:grad-yellow hover:bold-white">Acheter</button>
                    <button class="bg-violet-500 px-3 py-1 rounded bold-gray hover:grad-yellow hover:bold-white">Comande</button>
                    <div class="flex items-center">
                        <ul class="bold-gray hover: bold-white">
                            <li>
                                <span class="petit">envoyer message</span>
                            </li>
                            <li class="text-right">
                                <button class="fab fa-facebook-messenger"></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
