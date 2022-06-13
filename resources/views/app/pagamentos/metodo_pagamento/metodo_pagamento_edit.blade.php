<!-- Modal Adicionar Campus -->
<div class="modal fade" id="editarMetodoPagamento" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="editarPgt" action="{{ route('metodo-pagamento.update') }}" method="post">
            @csrf

            <input type="hidden" name="metodo_pagamento_id" id="metodo_pagamento_id">

            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="metodo_pagamento_input">Método de Pagamento <span
                                class="text-danger fw-bold"> *</span></label>
                        <div class="input-group input-group-merge">
                            <span id="metodo_pagamento_input" class="input-group-text"><i class="bx bx-money"></i></span>
                            <input type="text" name="metodo_pagamento" id="metodo_pagamento_edit" class="form-control"
                                placeholder="Cartão Bradesco ..">
                        </div>
                        <small class="text-danger">
                            <strong id="metodo_pagamento_edit_error"></strong>
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