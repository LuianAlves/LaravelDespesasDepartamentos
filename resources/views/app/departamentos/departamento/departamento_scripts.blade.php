<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>

<script>
    // Validação para UPDATE
    $('body').on('click', '#updateForm', function(){
    
    var editarDepart = $("#editarDepart");
    var formData = editarDepart.serialize();
    
    $('#departamento_edit_error').html( "" );
    
    $.ajax({
        url: "{{ url('https://bgorcamento.herokuapp.com/departamento/atualizar') }}",
        type: 'POST',
        data: formData,
        success: function(data) {
                if(data.errors) {
                    if(data.errors.departamento){
                        $('#departamento_edit_error').html( data.errors.departamento[0] );
                    }        
                }
                if(data.success) {
                    window.location.href="{{url('https://bgorcamento.herokuapp.com/departamento')}}";
                }
            },
        });
    });

    // Pegando dados para Modal Editar
    $(document).ready(function() {
        $(document).on('click', '.editbtn', function() {
 
            var departamento_id = $(this).val();
            $('#editarDepartamento').modal('show');
            $.ajax({
                type: 'GET',
                url: 'departamento/editar/'+departamento_id,
                success: function(response) {
                    $('#departamento_id').val(response.departamento.id);
                    $('#departamento_edit').val(response.departamento.departamento);
                }
            });
        });
    });
</script>