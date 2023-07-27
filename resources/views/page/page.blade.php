@extends("welcome")
@section("centre")
<div class="grid-media">
    @if(Route::is("crer"))
            <div class="col-span-4 px-8">
                @livewire("left")
                @livewire("left-creation")
            </div>
            <div class="col-span-5 px-12">
                @livewire("form")
            </div>
            <div class="col-span-3 px-8">
                @livewire("right")
            </div>
    @elseif(Route::is("acceuil"))
            <div class="col-span-4 px-8">
                @livewire("left")
            </div>
            <div class="col-span-5 px-12">
                @livewire("article")
            </div>
            <div class="col-span-3 px-8">
                @livewire("right")
            </div>
    @else
            <div class="col-span-4 px-8">
                @livewire("left")
            </div>
            <div class="col-span-5 px-12">
                @livewire("centre")
            </div>
            <div class="col-span-3 px-8">
            </div>
    @endif
</div>
@endsection
