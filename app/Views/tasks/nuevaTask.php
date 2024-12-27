<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="my-input">Título</label>
            <input id="title" class="form-control camposEditar" type="text" name="" value="">
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label for="my-input">Descripción</label>
            <input id="description" class="form-control camposEditar" type="text" name="" value="">
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#title').focus();
        var ruta = $('#principal').attr('ruta');
        $('#footer').html('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button><button type="button" class="btn btn-success" id="btnNuevaTask">Guardar</button>');

        $('#btnNuevaTask').click(function (e) { 
            var title = $('#title').val();
            var desc = $('#description').val();

            var array = {
                'title' : title,
                'desc' : desc
            };

            if(title == '')
            {
                $('#title').addClass('is-invalid');
                $('#title').focus();
            }
            else
            {
                $('#title').removeClass('is-invalid');
            }
            if(desc == '')
            {
                $('#description').addClass('is-invalid');
                $('#description').focus();
            }
            else
            {
                $('#description').removeClass('is-invalid');
            }

            if(title != '' && desc != '')
            {
                $.ajax({
                    type: "post",
                    url: ruta + "Home/addTask",
                    data: array,
                    dataType: "json",
                    success: function (response) {
                        if(response > 0)
                        {
                            Swal.fire({
                                title: "Nueva Tarea",
                                text: "Se ha agregado una nueva tarea",
                                icon: "success"
                            });
                            $('#mymodal').modal('hide');
                            $.ajax({
                                type: "get",
                                url: ruta + "Home/allTasks",
                                success: function (data){
                                    $("#principal").hide().html(data).fadeIn('slow');
                                },
                                error: function (e){
                                    console.log(e.responseText);
                                    Swal.fire('Error', 'Ha ocurrido un error al cargar la vista', 'error');
                                }
                            });
                        }
                        else
                        {
                            Swal.fire({
                                title: "Error",
                                text: "Ha ocurrido un error al agregar una tarea",
                                icon: "error"
                            });
                        }
                    },
                    error: function(e){
                        Swal.fire({
                            title: "Error",
                            text: "Ha ocurrido un error al agregar una tarea",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
</script>