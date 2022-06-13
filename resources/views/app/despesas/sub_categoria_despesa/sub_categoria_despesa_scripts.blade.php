<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>

<script>
    // EDIT - Validation
    $('body').on('click', '#updateForm', function(){
    
    var editarSubCat = $("#editarSubCat");
    var formData = editarSubCat.serialize();
    
    $('#categoria_despesa_id_edit_error').html( "" );
    $('#sub_categoria_despesa_edit_error').html( "" );
    
    $.ajax({
        url:"{{ route('sub-categoria-despesa.update') }}",
        type:'POST',
        data:formData,
        success:function(data) {
                if(data.errors) {
                    if(data.errors.categoria_despesa_id){
                        $('#categoria_despesa_edit_error').html( data.errors.categoria_despesa_id[0] );
                    }
                    if(data.errors.sub_categoria_despesa){
                        $('#sub_categoria_despesa_edit_error').html( data.errors.sub_categoria_despesa[0] );
                    }        
                }
                if(data.success) {
                    window.location.href="{{route('sub-categoria-despesa.index')}}";
                }
            },
        });
    });

    // EDIT - GET Dados para editar
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {
 
            var sub_categoria_despesa_id = $(this).val();

            $('#editarSubCategoriaDespesa').modal('show');
            $.ajax({
                type: 'GET',
                url: 'sub-categoria-despesa/' +sub_categoria_despesa_id+ '/edit',
                success: function(response) {
                    $('#sub_categoria_despesa_id').val(response.subcategoria.id);
                    $('#sub_categoria_despesa_edit').val(response.subcategoria.sub_categoria_despesa);
             
                    $("#categoria_id_edit option[data-value='" + response.categoria.categoria_despesa +"']").attr("selected","selected");
                }
            });
        });
    });
</script>