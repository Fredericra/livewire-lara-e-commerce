<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        {{ isset($titre)?$titre ." | ".config("app.name"):"Welcome | ".config("app.name") }}
    </title>
     @livewireStyles
    <!-- Fonts -->
    @vite(["resources/js/app.js","resources/css/app.css"])
   
</head>

<body class="grad-yellow">
    <div class="container ">
        @auth()
        <div class="relative">
            <div class="grid-media px-2 items-center grad-blue shadow-lg hover:shadow-md sticky-top ">
                <div class="col-span-2">
                    <div class="px-2">
                        <x-logo></x-logo>
                    </div>
                </div>
                <div class="col-span-3">
                    @livewire("search")
                </div>
                <div class="col-span-7">
                    <div class="grid grid-cols-2 py-2">
                        <div class="flex justify-between px-4 item-center mt-1">
                            <div>
                                <a href="{{ route('acceuil') }} " class="bold-white fas fa-gift fa-lg nav"></a>
                            </div>
                            <div>
                                <a href="" class="bold-white fas fa-user-plus fa-lg nav"></a>
                            </div>
                            <div>
                                <a href="" class="bold-white fab fa-facebook-messenger fa-lg nav"></a>
                            </div>
                            <div>
                                <a href="" class="bold-white fas fa-cart-arrow-down fa-lg nav"></a>
                            </div>
                            <div>
                                <a href="" class="bold-white fas fa-weight-hanging fa-lg nav"></a>
                            </div>
                            <div>
                                <a href="{{ route("crer") }}" class="bold-white fas fa-plus-circle fa-lg nav"></a>
                            </div>
                        </div>
                        <div class="flex justify-end items-center px-2 space-x-2">
                            <div>
                                <a href="" class="bold-white hover:bold-gray">
                                    {{ Auth::user()->email }} </a>
                            </div>
                            @livewire("button")
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
            <div class="row-auto py-2">
                @yield("centre")
            </div>
        </div>
        @else
        <div class="row-auto">
            <div class="flex justify-between py-2 px-2">
                <div class="">
                    <x-logo></x-logo>
                </div>
                <div class="px-2 py-2">
                    @livewire("button")
                </div>
            </div>
            @if(Route::is("connexion") or Route::is("inscrire") or Route::is("admin"))
            @if(Route::is("connexion"))
            @livewire("connexion")
            @elseif(Route::is("inscrire"))
            @livewire("inscrire")
            @elseif(Route::is("admin"))
            @livewire("admin")
            @endif
            @else
            <div class="flex justify-center space-x-5">
                <a href="" class="bold-white hover:bold-gray btn">Acceuil</a>
                <a href="" class="bold-white hover:bold-gray btn">Article</a>
                <a href="" class="bold-white hover:bold-gray btn">Plus</a>
                <a href="" class="bold-white btn-full border-2 border-white hover:bold-gray hover:grad-yellow">Apropos</a>
            </div>
            <div class="container py-4">
                <div class="grid-media">
                    <div class="col-span-4"></div>
                    <div class="col-span-4">
                        @livewire("article")
                    </div>
                    <div class="col-span-4"></div>
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
  
</body>
  @livewireScripts
</html>
