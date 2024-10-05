<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="d-flex justify-content-center align-items-center">
    <div class="p-4 bg-light border rounded" style="width: 80%; height: 95%; overflow: hidden;">
        <h1 class="text-center mb-4">Ventas</h1>
        <div class="row" style="height: 100%;">
            <div class="col-md-6 d-flex flex-column" style="height: 100%;">
                <!-- Formulario -->
                <div class="flex-grow-1 overflow-auto">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inpNombre" class="form-label">Nombre</label>
                                    <input id="inpNombre" type="text" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpApellidoP" class="form-label">Primer apellido</label>
                                    <input id="inpApellidoP" type="text" class="form-control" placeholder="Primer apellido" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpApellidoM" class="form-label">Segundo apellido</label>
                                    <input id="inpApellidoM" type="text" class="form-control" placeholder="Segundo apellido" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpFechaNacimiento" class="form-label">Fecha nacimiento</label>
                                    <input id="inpFechaNacimiento" type="date" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpRFC" class="form-label">RFC</label>
                                    <input id="inpRFC" type="text" class="form-control" placeholder="RFC" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpMail" class="form-label">Mail</label>
                                    <input id="inpMail" type="email" class="form-control" placeholder="example@domain.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpCelular" class="form-label">Celular</label>
                                    <input id="inpCelular" type="tel" class="form-control" placeholder="2722489823" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="inpCP" class="form-label">C.P.</label>
                                    <input id="inpCP" type="number" class="form-control" placeholder="94730" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpNoExterior" class="form-label">No. exterior</label>
                                    <input id="inpNoExterior" type="text" class="form-control" placeholder="Número exterior" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpCalle" class="form-label">Calle</label>
                                    <input id="inpCalle" type="text" class="form-control" placeholder="Calle" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpColonia" class="form-label">Colonia</label>
                                    <input id="inpColonia" type="text" class="form-control" placeholder="Colonia" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpCiudad" class="form-label">Ciudad</label>
                                    <input id="inpCiudad" type="text" class="form-control" placeholder="Ciudad" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inpEstado" class="form-label">Estado</label>
                                    <input id="inpEstado" type="text" class="form-control" placeholder="Estado" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="ddlFavProduct" class="form-label">Producto favorito</label>
                                <select id="ddlFavProduct" class="form-select" required>
                                    <option selected value="sabritas">Sabritas</option>
                                    <option selected value="chips">Chips</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="ddlBeneficio" class="form-label">Beneficio</label>
                                <select id="ddlBeneficio" class="form-select" required>
                                    <option selected value="-1">Elegir una opción</option>
                                    <option selected value="ProductoGratis">Producto gratis</option>
                                    <option selected value="Descuento">Descuento</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button id="btnGuardar" type="submit" class="btn btn-success btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 d-flex flex-column" style="height: 100%;">
                <!-- Tabla -->
                <div class="table-responsive flex-grow-1 overflow-auto">
                    <table class="table table-sm table-striped text-center">
                        <thead>
                            <tr class="table-dark">
                                <th class="col">Nombre</th>
                                <th class="col">Fecha nacimiento</th>
                                <th class="col">RFC</th>
                                <th class="col">Mail</th>
                                <th class="col">Celular</th>
                                <th class="col">C.P.</th>
                                <th class="col">Dirección</th>
                                <th class="col">Productos</th>
                                <th class="col">Beneficio</th>
                                <th class="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/index.js"></script>
