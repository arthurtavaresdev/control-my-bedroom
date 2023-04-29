<div class="mx-2 my-1">
    <div class="space-x-1">
        <span class="px-1 bg-black text-white">Lâmpada Quarto</span>
    </div>

    @if($response->success)
        <div class="mt-1 text-green">
            Mudanças Ocorreram com sucesso
        </div>
    @else
        <div class="mt-1 text-red">
            Erro ao tentar mudar o estado da lâmpada
        </div>
    @endif

    <div class="mt-1">
        <span class="font-bold text-green">Estado</span>

        @foreach($status as $item)
            <div class="flex space-x-1">
                <span class="font-bold"> {{$item?->code}} </span>
                <span class="flex-1 content-repeat-[.] text-gray"></span>
                <span class="font-bold text-green"> {{$item?->value}} </span>
            </div>
        @endforeach
    </div>
</div>