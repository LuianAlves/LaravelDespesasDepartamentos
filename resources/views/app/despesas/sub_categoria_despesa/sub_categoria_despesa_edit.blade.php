<!-- Modal Adicionar Campus -->
<div class="modal fade" id="editarSubCategoriaDespesa" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="editarSubCat" action="{{ url('https://bgorcamento.herokuapp.com/sub-categoria-despesa/atualizar') }}" method="post">
            @csrf

            <input type="hidden" name="sub_categoria_despesa_id" id="sub_categoria_despesa_id">

            <div class="modal-body">
                <div class="row">
                    
                    <div class="col-6">
                        <label class="form-label" for="categoria_despesa_input">Categoria de Despesas 
                        <span class="text-danger fw-bold"> *</span></label>
                        <select class="form-select" name="categoria_despesa_id" id="categoria_despesa_id_edit">
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}" data-value="{{$categoria->categoria_despesa}}">{{$categoria->categoria_despesa}}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">
                            <strong id="categoria_despesa_edit_error"></strong>
                        </small>
                    </div>

                    <div class="col-6">
                        <label class="form-label" for="sub_categoria_despesa_input">Sub Categoria de Despesas <span
                                class="text-danger fw-bold"> *</span></label>
                        <div class="input-group input-group-merge">
                            <span id="sub_categoria_despesa_input" class="input-group-text"><i class="bx bx-category"></i></span>
                            <input type="text" name="sub_categoria_despesa" id="sub_categoria_despesa_edit" class="form-control"
                                placeholder="Despesas com Cumbustíveis ..">
                        </div>
                        <small class="text-danger">
                            <strong id="sub_categoria_despesa_edit_error"></strong>
                        </small>
                    </div>

                </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Fechar
                </button>
                <button type="button" class="btn btn-primary" id="updateForm">Atualizar</button>
            </div>

        </form>
    </div>
</div>