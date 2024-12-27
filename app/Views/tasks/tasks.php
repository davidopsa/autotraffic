        <div class="col-12">
            <div class="container" id="alltasks">
                <h3>All Tasks</h3>
                <button type="button" id="newtask" class="btn btn-primary float-end"><i class="fa fa-plus" aria-hidden="true"></i> Nueva tarea</button>
                <br><br>
                <div>
                    <table class="table table-hover" id="tableTasks" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Fecha Creación</th>
                                <th>Fecha Edición</th>
                                <th>Completado</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <div id="resumeTask" hidden>
            <input type="hidden" id="id" value="">
            <div class="container">
                <center><h3>Información de la Tarea</h3></center><br>
                <div class="row">
                    <div class="col-md-2">
                        <strong>Title:</strong>
                    </div>
                    <div class="col-md-2">
                        <div id="infotitle">Meeting</div>
                    </div>
                    <div class="col-md-4">
                        <strong>Descripcion:</strong>
                    </div>
                    <div class="col-md-4">
                        <div id="infodescription">En esta reunion se realizarán los respectivos assessment's</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <strong>Fecha creación:</strong>
                    </div>
                    <div class="col-md-2">
                        <div id="infocreated">24/12/2024</div>
                    </div>
                    <div class="col-md-2">
                        <strong>Fecha Edición:</strong>
                    </div>
                    <div class="col-md-2">
                        <div id="infoedited">25/12/2024</div>
                    </div>
                    <div class="col-md-2">
                        <strong>Completada:</strong>
                    </div>
                    <div class="col-md-2">
                        <div id="infocompleted">False</div>
                    </div>
                </div>
                <br>
                <div class="col-lg-12">
                    <button type="button" class="btn btn-primary float-start" style="margin: 2px;" id="volverTasks">Volver a Tareas</button>
                    <button type="button" class="btn btn-warning float-end" style="margin: 2px;" id="editarTask">Editar</button>
                    <button type="button" class="btn btn-danger float-end" style="margin: 2px;" id="eliminarTask">Eliminar</button>
                </div>
            </div>
        </div>

        <div id="editTask" hidden>
            <div class="container">
                <center><h3>Información de la Tarea</h3></center><br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="my-input">Título</label>
                            <input id="editTitle" class="form-control camposEditar" type="text" name="" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="my-input">Descripción</label>
                            <input id="editDescription" class="form-control camposEditar" type="text" name="" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="my-input">Completado</label>
                            <select class="form-select" name="editCompleted" id="editCompleted" style="">
                                <option value=""></option>
                                <option value="1">Terminada</option>
                                <option value="0">Incompleta</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">     
                        <button type="button" class="btn btn-primary float-start" style="margin: 2px;" id="volverTasks2">Volver Tareas</button>
                        <button type="button" class="btn btn-success float-end" style="margin: 2px;" id="guardarTask">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                var ruta = $('#principal').attr('ruta');

                //Obtener todos las tareas
                $.ajax({
                        type: "get",
                        url: ruta + "Home/getTasks",
                        dataType: "json",
                        success: function (response) {
                            $('#tableTasks').addClass('dt-head-center');
                            var i = 1;
                            var table = $('#tableTasks').DataTable({
                                "language": {
                                    'url': '//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                                },
                                order: [
                                    [0, 'desc']
                                ],
                                "responsive": true,
                                "data": response,
                                "columns": [
                                    { "data": "id" },
                                    { "data": "title" },
                                    { "data": "description" },
                                    { "data": "created_at" },
                                    { "data": "updated_at" },
                                    { "data": "completed" },
                                ]
                            });

                            $('#tableTasks tbody').on('dblclick', 'tr', function() {
                                var data = table.row(this).data();
                                console.log(data);

                                var id = data['id'];
                                var title = data['title'];
                                var description = data['description'];
                                var created_at = data['created_at'];
                                var updated_at = data['updated_at'];
                                var completed = data['completed'];

                                $('#id').val(id);
                                $('#infotitle').text(title);
                                $('#infodescription').text(description);
                                $('#infocreated').text(created_at);
                                $('#infoedited').text(updated_at);
                                $('#infocompleted').text(completed);
                                
                                $('#editTitle').val(title);
                                $('#editDescription').val(description);
                                $('#editCompleted').val(completed);

                                $('#alltasks').hide();
                                $('#resumeTask').removeAttr('hidden');
                                $('#resumeTask').show('600');
                            });

                        },
                        error: function(e)
                        {
                            console.log(e.responseText);
                        }
                    });

                //Volver al listado de las tareas
                $('#volverTasks').click(function (e) { 
                    $('#alltasks').show(700);
                    $('#resumeTask').hide();
                    $('#editTask').hide();
                });

                $('#volverTasks2').click(function (e) { 
                    $('#alltasks').show(700);
                    $('#resumeTask').hide();
                    $('#editTask').hide();
                });

                //Habilitar campos edicion
                $('#editarTask').click(function (e) { 
                    $('#alltasks').hide();
                    $('#resumeTask').hide();
                    $('#editTask').removeAttr('hidden');
                    $('#editTask').show(700);
                });

                //Eliminar
                $('#eliminarTask').click(function (e) { 
                    var id = $('#id').val();
                    const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: "Eliminar Tarea",
                        text: "Se eliminará la tarea del sistema ¿Continuar?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Si",
                        cancelButtonText: "No",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "post",
                                url: ruta + "Home/deleteTask",
                                data: {'id' : id},
                                dataType: "text",
                                success: function (resp1) {
                                    console.log(resp1);
                                    if(resp1 == 1)
                                    {
                                        Swal.fire({
                                            title: "Eliminado",
                                            text: "La tarea ha sido Eliminado del Sistema",
                                            icon: "success",
                                            allowOutsideClick: false,
                                            allowEscapeKey: false,
                                            showCancelButton: false,
                                            confirmButtonColor: "#3085d6",
                                            confirmButtonText: "Ok"
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                $.ajax({
                                                    type: "method",
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
                                        });
                                    }
                                    else
                                    {
                                        swalWithBootstrapButtons.fire({
                                            title: "Error",
                                            text: "Ha ocurrido un error al eliminar la tarea del Sistema",
                                            icon: "error"
                                        });
                                    }
                                },
                                error: function(e)
                                {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error",
                                        text: "Ha ocurrido un error al eliminar la tarea del Sistema",
                                        icon: "error"
                                    });
                                    console.log(e.responseText);
                                }
                            });
                        }
                    });
                });

                //Guardar cambios de edicion
                $('#guardarTask').click(function (e) { 
                    var id = $('#id').val();
                    var title = $('#editTitle').val();
                    var description = $('#editDescription').val();
                    var completed = $('#editCompleted').val();

                    var data = {
                        'id' : id,
                        'title' : title,
                        'description' : description,
                        'completed' : completed
                    };

                    $.ajax({
                        type: "POST",
                        url: ruta + "Home/updateTask",
                        data: data,
                        dataType: "json",
                        success: function (updated) {
                            if(updated == 1)
                            {
                                Swal.fire({
                                    title: "Actualizado",
                                    text: "Se ha actualizado la tarea",
                                    icon: "success"
                                });
                                $.ajax({
                                    type: "method",
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
                        },
                        error: function (e){
                            console.log(e);
                        }
                    });
                });

                $('#newtask').click(function (e) { 
                    $('#modal-title').text('Nueva Tarea');
                    $.ajax({
                        type: "get",
                        url: ruta + "Home/nuevaTask",
                        success: function (response) {
                            $('#cuerpoModal').html(response);
                        }
                    });
                    $('#mymodal').modal('show');
                });
            });
        </script>