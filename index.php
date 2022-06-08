<?php include_once 'global/conexion/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>


</head>

<body>
    <div class="container">
        <hr>
        <div>
            <h1>Lista de Mascotas</h1>
        </div>
        <hr>
        <div class="row mt-5">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h3>Agregar mascotas</h3>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tipo</label>
                        <input type="text" class="form-control" id="tipo" placeholder="Tipo">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Edad</label>
                        <input type="number" class="form-control" id="edad" placeholder="Edad" required min="0">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Enfermedades</label>
                        <input type="text" class="form-control" id="enfermedades" placeholder="Enfermedades" required>
                    </div>
                </div>

                <button onclick="agregarTabla()" type="submit" class="btn btn-info float-right">Guardar</button>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <h3>Lista de mascotas</h3>
                <hr>
                <div id="tabla" class="table-responsive">

                </div>
            </div>
        </div>
    </div>
</body>

<script src="js/crud.js"></script>



<!-- Modal -->
<div class="modal fade" id="editar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Mascotas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-12">
                        <input type="hidden" id="e_id">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="e_nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group col-12">
                        <label>Tipo</label>
                        <input type="text" class="form-control" id="e_tipo" placeholder="Tipo">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-12">
                        <label>Edad</label>
                        <input type="number" class="form-control" id="e_edad" placeholder="Edad" required min="0">
                    </div>
                    <div class="form-group col-12">
                        <label>Enfermedades</label>
                        <input type="text" class="form-control" id="e_enfermedades" placeholder="Enfermedades" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" onclick="editarTabla()">Editar</button>
            </div>
        </div>
    </div>
</div>



</html>