<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>

<script>
    // Validação para UPDATE
    $('body').on('click', '#updateForm', function() {

        var editarPgt = $("#editarPgt");
        var formData = editarPgt.serialize();

        $('#metodo_pagamento_edit_error').html("");
        
        $.ajax({
            url: "{{ url('https://bgorcamento.herokuapp.com/metodo-pagamento/atualizar') }}",
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.errors) {
                    if (data.errors.metodo) {
                        $('#metodo_pagamento_edit_error').html(data.errors.metodo[0]);
                    }
                }
                if (data.success) {
                    window.location.href = "{{ url('https://bgorcamento.herokuapp.com/metodo-pagamento') }}";
                }
            },
        });
    });

    // Pegando dados para Modal Editar
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {

            var metodo_pagamento_id = $(this).val();

            $('#editarMetodoPagamento').modal('show');
            $.ajax({
                type: 'GET',
                url: 'metodo-pagamento/editar/'+ metodo_pagamento_id,
                success: function(response) {
                    $('#metodo_pagamento_id').val(response.metodo.id);
                    $('#metodo_pagamento_edit').val(response.metodo.metodo_pagamento);
                }
            });
        });
    });
</script>
