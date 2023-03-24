@section('filterButton')
<div class="d-flex col-6">
    <input type="text" class="form-control">
    <button class="ml-1 btn btn-dark">Pesquisar</button>
    <div class="">
        <button class="ml-2 btn btn-outline-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Filtros</button>
    </div>
</div>
@endsection
@section('filters')
<script type="text/javascript" src="{{asset('js/filters.js')}}"></script>
<div class="collapse mt-2" id="collapseExample">
    <div class="card card-body bg-light">
        <div class="col-md-12 col-sm-12 d-flex">
            <div class="card card-body col-md-3 col-sm-3">
                <div class="d-flex col-12">
                    <label for="" class="form-label h6">Nº itens por página</label>
                    <div class="col-md-4 col-sm-4 ml-2">
                        <input type="number" class="form-control" name="per_page" value="" id="per_page">
                    </div>
                </div>
            </div>
            <div class="card card-body col-md-12 col-sm-12 ml-2">
                <div class="d-flex col-12">
                    <button class="btn btn-success" id="save">salvar</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
