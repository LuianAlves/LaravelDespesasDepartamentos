<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>

<script>
    // Select Sub Categoria
    $(document).ready(function() {
        $('select[name="categoria_despesa_id"]').on('change', function() {
            var categoria_despesa_id = $(this).val()

            if (categoria_despesa_id) {
                $.ajax({
                    url: "{{ url('/sub-categoria-despesa/ajax') }}/" + categoria_despesa_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data)
                        var d = $('select[name="sub_categoria_despesa_id"]').empty()
                        $.each(data, function(key, value) {
                            // console.log(value.codigo_turma)
                            $('select[name="sub_categoria_despesa_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .sub_categoria_despesa + '</option>')
                        })
                    },
                })
            } else {
                alert('Error!')
            }
        })
    })

    // // Editar
    // $(document).ready(function() {
    //     $(document).on('click', '.editbtn', function() {
 
    //         var categoria_despesa_id = $(this).val();
    //         $('#editarCategoriaDespesa').modal('show');
    //         $.ajax({
    //             type: 'GET',
    //             url: 'categoria-despesa/' +categoria_despesa_id+ '/edit',
    //             success: function(response) {
    //                 $('#categoria_despesa_id').val(response.categoria.id);
    //                 $('#categoria_despesa_edit').val(response.categoria.categoria_despesa);
    //             }
    //         });
    //     });
    // });
</script>