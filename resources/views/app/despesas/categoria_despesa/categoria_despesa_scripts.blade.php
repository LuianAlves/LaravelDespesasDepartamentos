<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>

<script>
    // Validação para UPDATE
    $('body').on('click', '#updateForm', function() {

        var editarCat = $("#editarCat");
        var formData = editarCat.serialize();

        $('#categoria_despesa_edit_error').html("");

        $.ajax({
            url: "{{ url('https://bgorcamento.herokuapp.com/categoria-despesa/atualizar') }}",
            type: 'POST',
            data: formData,
            success: function(data) {
                if (data.errors) {
                    if (data.errors.categoria) {
                        $('#categoria_despesa_edit_error').html(data.errors.categoria[0]);
                    }
                }
                if (data.success) {
                    window.location.href = "{{ url('https://bgorcamento.herokuapp.com/categoria-despesa') }}";
                }
            },
        });
    });

    // Pegando dados para Modal Editar
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {

            var categoria_despesa_id = $(this).val();
            $('#editarCategoriaDespesa').modal('show');
            $.ajax({
                type: 'GET',
                url: 'categoria-despesa/editar/'+categoria_despesa_id,
                success: function(response) {
                    $('#categoria_despesa_id').val(response.categoria.id);
                    $('#categoria_despesa_edit').val(response.categoria.categoria_despesa);
                }
            });
        });
    });
</script>
