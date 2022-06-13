<!-- Modal Adicionar Campus -->
<div class="modal fade" id="editarCategoriaDespesa" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="editarCat" action="{{ route('categoria-despesa.update') }}" method="post">
            @csrf

            <input type="hidden" name="categoria_despesa_id" id="categoria_despesa_id">

            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="categoria_despesa_input">Categoria de Despesas <span
                                class="text-danger fw-bold"> *</span></label>
                        <div class="input-group input-group-merge">
                            <span id="categoria_despesa_input" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="categoria_despesa" id="categoria_despesa_edit" class="form-control"
                                placeholder="Despesas com Viagens ..">
                        </div>
                        <small class="text-danger">
                            <strong id="categoria_despesa_edit_error"></strong>
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