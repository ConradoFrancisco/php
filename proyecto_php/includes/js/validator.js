$("#registro").validate({
    rules: {
        nombre: {
            required : true,
            minlength: 5
        },
        apellido: {
            required: true,
            minlength: 5
        },
        contraseña: {
            required: true,
            minlength: 8,
            number: true
        },
        repetir_contraseña: {
            required: true,
            equalTo: '#contraseña'
        }
    },
    messages: {
        nombre: {
            required: "*El campo nombre no puede estar vacio",
            minlength: "*Este campo no puede tener menos de 5 caracteres*"
        },
        apellido: {
            required: "*El campo apellido no puede estar vacio",
            minlength: "*Este campo no puede tener menos de 5 caracteres"
        },
        contraseña:{
            required : "*la contraseña es obligatoria",
            minlength: "*la contraseña no puede tener menos de 8 caracteres",
            number: "*la contraseña debe tener 1 numero al menos"
        },
        repetir_contraseña:{
            required: "*La contraseña no puede estar vacia",
            equalTo: "*Las contraseñas deben coincidir"
        }
    },



    submitHandler: function(form) {
      form.submit();
    }
   });