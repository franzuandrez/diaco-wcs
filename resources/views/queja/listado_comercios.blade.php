<div class="col-lg-8 equel-grid">
    <div class="grid">
        <p class="grid-header">Elige el comercio</p>
        <div class="grid-body">
            <div class="item-wrapper">
                <form action="{{route('queja.create')}}"
                      id="form_busqueda_comercio"
                      class="t-header-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control"
                               name="query_comercio"
                               value="{{$query_comercio}}"
                               id="inlineFormInputGroup"
                               placeholder="Buscar" autocomplete="off">
                        <button class="btn btn-primary" type="submit"><i
                                class="mdi mdi-arrow-right-thick"></i></button>
                    </div>

                    <input id="id_comercio"
                           name="id_comercio"
                           type="hidden"
                           value="{{$id_comercio}}"
                    >
                </form>

                <div class="col-md-12 equel-grid">
                    <div class="grid">

                        <div class="item-wrapper">
                            <div class="table-responsive">
                                <table class="table info-table">
                                    <thead>
                                    <tr class="solid-header">
                                        <th class="pl-4">Nombre</th>
                                        <th class="pl-4"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comercios as $comercio)
                                        <tr>
                                            <td>{{ $comercio->nombre}}</td>
                                            <td>
                                                <div
                                                    onclick="seleccionar_comercio('{{$comercio->id}}')"
                                                    class="btn btn-primary has-icon btn-rounded">
                                                    <i class="mdi mdi-subdirectory-arrow-right"></i>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
