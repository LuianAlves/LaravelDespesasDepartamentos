<!-- Modal Adicionar Campus -->
<div class="modal fade" id="editarDepartamento" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="editarDepart" action="{{ url('https://bgorcamento.herokuapp.com/departamento/atualizar') }}" method="post">
            @csrf

            <input type="hidden" name="departamento_id" id="departamento_id">

            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label class="form-label" for="departamento_input">Departamento <span
                                class="text-danger fw-bold"> *</span></label>
                        <div class="input-group input-group-merge">
                            <span id="departamento_input" class="input-group-text"><i class="bx bx-buildings"></i></span>
                            <input type="text" name="departamento" id="departamento_edit" class="form-control"
                                placeholder="Marketing ..">
                        </div>
                        <small class="text-danger">
                            <strong id="departamento_edit_error"></strong>
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
