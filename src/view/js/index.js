const uri = 'http://localhost:8000/venta';

$(window).on('load', async function(){
    //Limpiar cuerpo de tabla
    $('tbody').empty();

    //
    const data = await get();

    //Llenar tabla
    if(data.length > 0) {
        $.each(data, function(i, Venta){
            //Fecha de nacimiento
            const [anio, mes, dia] = Venta.fechaNacimiento.split("-");

            //Iterar data
            const fila = `
                <tr>
                    <td>
                        ${ Venta.nombre } ${ Venta.apellidoPaterno } ${ Venta.apellidoMaterno }
                    </td>
                    <td>
                        ${dia} de ${mes} de ${anio}
                    </td>
                    <td>
                        ${ Venta.rfc }
                    </td>
                    <td>
                        ${ Venta.mail }
                    </td>
                    <td>
                        ${ Venta.celular }
                    </td>
                    <td>
                        ${ Venta.codigoPostal }
                    </td>
                    <td>
                        ${ Venta.noExterior }, ${ Venta.calle }, ${ Venta.colonia }, ${ Venta.ciudad }, ${ Venta.estado }
                    </td>
                    <td>
                        ${ Venta.productosFavoritos }
                    </td>
                    <td>
                        ${ Venta.beneficioElegido }
                    </td>
                    <td>
                        <button id="${ Venta.id }" type="button" class="btn btn-sm btn-danger btn-delete" onclick="drop(this)">
                            Eliminar
                        </button>
                    </td>
                </tr>
            `;

            //[tbody]
            $('tbody').append(fila);
        });
    }
});

function drop(button){
    const ventaId = button.id;

    $.ajax({
        url: `${uri}/delete?id=${ventaId}`,
        type: 'DELETE',
        dataType: 'json',
        success: (response) => {
            if(response.status.includes('5')){
                alert(response.message);
            }
            alert('elemento eliminado');
            window.location.reload();
        },
        error: (error, status) => {
            error = JSON.parse(error.responseText);
            console.log(error);
        }
    });
}

$('#btnGuardar').click(async(event) => {
    //Cancelar evento 'submit'
    event.preventDefault();

    //Validar si el formulario a sido llenado
    if(event.target.checkValidity()){
        await save();
    }
    else{
        alert('Formulario incompleto');
    }
});

const get = async() => {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: `${uri}/get`,
            type: 'GET',
            dataType: 'json',
            success: (response) => {
                if(response.status.includes('5')){
                    alert(response.message);
                }
                resolve(response.data);
            },
            error: (error, status) => {
                error = JSON.parse(error.responseText);
                console.log(error);
            }
        });
    });
}

const save = async() => {
    //Obtener la data del formulario
    const data = getData();
        
    //Realizar peticion
    $.ajax({
        url: `${uri}/save`,
        type: 'POST',
        data: JSON.stringify(data),
        dataType: 'json',
        success: (response) => {
            alert(response.message);
            window.location.reload();
        },
        error: (error, status) => {
            error = JSON.parse(error.responseText);
            console.log(error);
        }
    });
}

const getData = () => {
    const nombre = $('#inpNombre').val();
    const apellidoPaterno = $('#inpApellidoP').val();
    const apellidoMaterno = $('#inpApellidoM').val();
    const fechaNacimiento = $('#inpFechaNacimiento').val();
    const rfc = $('#inpRFC').val();
    const mail = $('#inpMail').val();
    const celular = $('#inpCelular').val();
    const codigoPostal = $('#inpCP').val();
    const calle = $('#inpCalle').val();
    const colonia = $('#inpColonia').val();
    const ciudad = $('#inpCiudad').val();
    const estado = $('#inpEstado').val();
    const noExterior = $('#inpNoExterior').val();
    const productosFavoritos = $('#ddlFavProduct').val();
    const beneficioElegido = $('#ddlBeneficio').val();

    return {
        nombre,
        apellidoPaterno,
        apellidoMaterno,
        fechaNacimiento,
        rfc,
        mail,
        celular,
        codigoPostal,
        calle,
        colonia,
        ciudad,
        estado,
        noExterior,
        productosFavoritos,
        beneficioElegido
    };
}
