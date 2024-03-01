$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    $(window).on("scroll", function () {
        var ScrollTop = parseInt($(window).scrollTop());
        if (ScrollTop > 1) {
            $('[data-pages="header"]').addClass('minimized green');
        } else {
            if (ScrollTop < 10) {
                $('[data-pages="header"]').removeClass('minimized green');
            }
        }
    });

    /** @desc Lightbox */

    $.fn.lightbox = function () {
        var img = this;

        function open(img) {
            // Create #lightbox element
            $('<div id="lightbox"></div>').appendTo('body');

            $('<i class="fa fa-times close-overlay"></i').delay('fast').fadeIn().appendTo('#lightbox').click(close);

            $.each(img, function () {
                $('<img>').attr('src', $(this).attr('src')).appendTo('#lightbox');
            });
        };

        function close() {
            $('#lightbox').fadeOut('fast', function () {
                $(this).remove();
            });
        };

        img.click(function () {
            open($(this));
        });
    };

    $('.lightbox').lightbox();

    /**
    * @description DataTables
    * Lanza los DataTables de jQuery
    */
    var table = $('#tableCrud').DataTable({
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center'
        }],
        'order': [[1, 'asc']]
    });

    $('#tableCrud_wrapper').children('.row').children('.col-sm-12').addClass('tbl-responsive');

    $('#form-del-selected').on('click', function (e) {
        e.preventDefault();
        var form = this;

        $(form).find('.form-group').empty();

        // Iterate over all checkboxes in the table
        table.$('input[type="checkbox"]').each(function () {
            // If checkbox is checked
            if (this.checked) {
                $('#multiple-delete').modal('show');
                // Create a hidden element
                $(form).find('.form-group').append($('<input>').attr('type', 'hidden').attr('name', this.name).val(this.value));
            }
        });
    });

    $('body').on('click', '#confirm-del-selected', function (event) {
        event.preventDefault();
        $('#form-del-selected').submit();
    });

    $('.table-full').on('click', '.btn-delete', function (e) {
        e.preventDefault();
        var $formDel = $(this).parent(),
            $nombre_elemento = $formDel.attr('data-nombre');

        $('.modal').find('.modal-title').text('Nombre: ' + $nombre_elemento);
        $('.modal').find('.modal-body').text('Está seguro que desea eliminar este registro?');
        $('#btn-delete').text('Eliminar');
        $('#confirm-delete').modal({ backdrop: 'static', keyboard: false }).on('click', '#btn-delete', function () {
            $formDel.submit();
        });
    });

    /**
    * @description Abrir menú lateral
    *
    */
    $('[data-pages="header-toggle"], [data-pages="sidebar-toggle"]').on('click touchstart', function (e) {
        e.preventDefault();
        var bars = $(this);
        var header = bars.attr('data-pages-element');
        $('body').toggleClass('menu-opened');
        $('[data-pages="header-toggle"]').toggleClass('on');
    });

    /**
    * @description Validar los campos de la ficha técnica
    *
    */
    $('input[data-preview]').change(function () {

        //because this is single file upload I use only first index
        var f = this.files[0];
        var method_prefix = 'preview';
        var method_name = $(this).attr('data-preview');

        //here I CHECK if the FILE SIZE is bigger than 8 MB (numbers below are in bytes)
        if (f.size > 4388608 || f.fileSize > 4388608) {
            //show message to the user
            $(this).parent().parent().append('<span class="help-block danger-block">El tamaño máximo del archivo debe ser 4MB</span>');

            //reset file upload control
            this.value = null;
        } else {
            window[method_prefix + method_name](null);
        }
    });

    $("#fichaTecnica").validate({
        rules: {
            foto: {
                required: true,
                maxlength: 191,
                accept: "image/*"
            },
            ficha_tecnica: {
                required: true,
                maxlength: 191,
                accept: "application/pdf"
            },
            nombre: {
                required: true,
                maxlength: 191
            },
            nombre_cientifico: {
                required: true,
                maxlength: 191
            },
            familia: {
                required: true,
                maxlength: 191
            },
            origen: {
                required: true,
                maxlength: 191
            },
            propagacion: {
                required: true,
                maxlength: 191
            },
            altitud_siembra: {
                required: true,
                maxlength: 191
            },
            descripcion: {
                required: true
            },
            caracteristica: {
                required: true,
                maxlength: 191
            },

            detalle_tronco: {
                maxlength: 191,
                accept: "image/*"
            },
            detalle_tallo: {
                maxlength: 191,
                accept: "image/*"
            },
            detalle_flor: {
                maxlength: 191,
                accept: "image/*"
            },
            detalle_hoja: {
                maxlength: 191,
                accept: "image/*"
            },
            detalle_fruto: {
                maxlength: 191,
                accept: "image/*"
            }
        },
        messages: {
            foto: {
                required: "Por favor ingresa una foto",
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            ficha_tecnica: {
                required: "Por favor ingrese la ficha técnica en archivo PDF",
                maxlength: "Introduzca un archivo cuyo nombre tenga máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extension (.pdf)"
            },
            nombre: {
                required: "Por favor ingresa el nombre común",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            nombre_cientifico: {
                required: "Por favor ingresa el nombre científico",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            familia: {
                required: "Por favor ingresa la familia",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            origen: {
                required: "Por favor ingresa el origen",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            propagacion: {
                required: "Por favor ingresa la propagación",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            altitud_siembra: {
                required: "Por favor ingresa la altitud siembra",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            descripcion: {
                required: "Por favor ingresa la descripción"
            },
            caracteristica: {
                required: "Por favor ingresa la característica",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },

            detalle_tronco: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            detalle_tallo: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            detalle_flor: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            detalle_hoja: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            detalle_fruto: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            }
        },
        submitHandler: function submitHandler(form) {
            $('.overlay-form').css({
                'opacity': 0.7,
                'visibility': 'visible'
            });
            form.submit();
        }
    });

    /**
    * @description Validar los campos de la ficha técnica EDIT
    *
    */
    $("#fichaTecnicaEdit").validate({
        rules: {
            foto: {
                maxlength: 191,
                accept: "image/*"
            },
            nombre: {
                required: true,
                maxlength: 191
            },
            nombre_cientifico: {
                required: true,
                maxlength: 191
            },
            familia: {
                required: true,
                maxlength: 191
            },
            origen: {
                required: true,
                maxlength: 191
            },
            propagacion: {
                required: true,
                maxlength: 191
            },
            altitud_siembra: {
                required: true,
                maxlength: 191
            },
            descripcion: {
                required: true
            },
            caracteristica: {
                required: true,
                maxlength: 191
            },

            detalle_tronco: {
                maxlength: 191,
                accept: "image/*"
            },
            detalle_tallo: {
                maxlength: 191,
                accept: "image/*"
            },
            detalle_flor: {
                maxlength: 191,
                accept: "image/*"
            },
            detalle_hoja: {
                maxlength: 191,
                accept: "image/*"
            },
            detalle_fruto: {
                maxlength: 191,
                accept: "image/*"
            }
        },
        messages: {
            foto: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            ficha_tecnica: {
                maxlength: "Introduzca un archivo cuyo nombre tenga máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extension (.pdf)"
            },
            nombre: {
                required: "Por favor ingresa el nombre común",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            nombre_cientifico: {
                required: "Por favor ingresa el nombre científico",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            familia: {
                required: "Por favor ingresa la familia",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            origen: {
                required: "Por favor ingresa el origen",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            propagacion: {
                required: "Por favor ingresa la propagación",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            altitud_siembra: {
                required: "Por favor ingresa la altitud siembra",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            descripcion: {
                required: "Por favor ingresa la descripción"
            },
            caracteristica: {
                required: "Por favor ingresa la característica",
                maxlength: "Introduzca un máximo de 191 caracteres"
            },
            detalle_tronco: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            detalle_tallo: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            detalle_flor: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            detalle_hoja: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            },
            detalle_fruto: {
                maxlength: "El archivo debe constar de un máximo de 191 caracteres",
                accept: "Por favor carga un archivo con extensión de imágen válida"
            }
        }
    });

    /**
    * @description Overlay de búsqueda
    *
    */
    $('body').on('click', '.card-filtros', function (event) {
        event.preventDefault();
        var bgOpacity = 1,
            $card = $(this),
            $bgColor = $card.attr('data-color'),
            $background = $card.attr('data-background'),
            $title = $card.find('h4').text(),
            $id = $card.attr('data-id');

        $('body').addClass('noscroll');
        $('#overlay').addClass('open');
        $('#overlay').css('background-color', $bgColor);

        $('.title-overlay, .first-col, .second-col, .third-col, .fourth-col').children().empty();

        $('<h1 class="mobile-title">' + $title + '</h1><p>Por favor seleccione uno de los siguientes filtros de búsqueda</p>').appendTo('#overlay .title-overlay');

        $('#overlay').toggleClass($background);

        $.ajax({
            url: 'obtener_filtros',
            type: 'GET',
            dataType: 'json',
            data: { id: $id },
            success: function success(data) {
                // Caracterización
                if (data.nombre_filtro == 'climatologia') {
                    $('<li class="link1 title-sec-ov"><h2>Ambiente</h2></li>').appendTo('.first-col ul');
                    $('<li class="link2">' + data.cl_humedo_tropical + '</li>').appendTo('.first-col ul');
                    $('<li class="link3">' + data.cl_seco_tropical + '</li>').appendTo('.first-col ul');
                    $('<li class="link4">' + data.cl_selva_premontana + '</li>').appendTo('.first-col ul');

                    $('<li class="link5 title-sec-ov"><h2>Clima</h2></li>').appendTo('.second-col ul');
                    $('<li class="link6">' + data.cl_frio + '</li>').appendTo('.second-col ul');
                    $('<li class="link7">' + data.cl_templado + '</li>').appendTo('.second-col ul');
                    $('<li class="link8">' + data.cl_calido + '</li>').appendTo('.second-col ul');

                    $('<li class="link9 title-sec-ov"><h2>Viento</h2></li>').appendTo('.third-col ul');
                    $('<li class="link10">' + data.cl_alto + '</li>').appendTo('.third-col ul');
                    $('<li class="link1">' + data.cl_medio + '</li>').appendTo('.third-col ul');
                    $('<li class="link5">' + data.cl_bajo + '</li>').appendTo('.third-col ul');
                } else if (data.nombre_filtro == 'suelo') {
                    $('<li class="link1 title-sec-ov"><h2>Naturaleza</h2></li>').appendTo('.first-col ul');
                    $('<li class="link2">' + data.su_acido + '</li>').appendTo('.first-col ul');
                    $('<li class="link3">' + data.su_medio + '</li>').appendTo('.first-col ul');
                    $('<li class="link4">' + data.su_medio_acido + '</li>').appendTo('.first-col ul');

                    $('<li class="link5 title-sec-ov"><h2>Materia Orgánica</h2></li>').appendTo('.second-col ul');
                    $('<li class="link6">' + data.su_rico + '</li>').appendTo('.second-col ul');
                    $('<li class="link7">' + data.su_medio_mo + '</li>').appendTo('.second-col ul');
                    $('<li class="link8">' + data.su_pobre + '</li>').appendTo('.second-col ul');

                    $('<li class="link9 title-sec-ov"><h2>Textura</h2></li>').appendTo('.third-col ul');
                    $('<li class="link10">' + data.su_franco + '</li>').appendTo('.third-col ul');
                    $('<li class="link11">' + data.su_arenoso + '</li>').appendTo('.third-col ul');
                    $('<li class="link4">' + data.su_arcilloso + '</li>').appendTo('.third-col ul');
                } else if (data.nombre_filtro == 'fisiologia') {
                    $('<li class="link1 title-sec-ov"><h2>Longevidad</h2></li>').appendTo('.first-col ul');
                    $('<li class="link2">' + data.fi_alta + '</li>').appendTo('.first-col ul');
                    $('<li class="link3">' + data.fi_media + '</li>').appendTo('.first-col ul');
                    $('<li class="link4">' + data.fi_ba + '</li>').appendTo('.first-col ul');

                    $('<li class="link5 title-sec-ov"><h2>Crecimiento</h2></li>').appendTo('.second-col ul');
                    $('<li class="link6">' + data.fi_rapido + '</li>').appendTo('.second-col ul');
                    $('<li class="link7">' + data.fi_medio_crec + '</li>').appendTo('.second-col ul');
                    $('<li class="link8">' + data.fi_lento + '</li>').appendTo('.second-col ul');
                }
                // Categorización
                if (data.nombre_filtro == 'infraestructura_vial') {
                    $('<li class="link1">' + data.separador_avenida + '</li>').appendTo('.first-col ul');
                    $('<li class="link2">' + data.andenes + '</li>').appendTo('.first-col ul');
                    $('<li class="link3">' + data.glorieta_rotonda + '</li>').appendTo('.first-col ul');
                    $('<li class="link4">' + data.puentes + '</li>').appendTo('.first-col ul');
                } else if (data.nombre_filtro == 'infraestructura_construida') {
                    $('<li class="link1 title-sec-ov"><h2>Uso residencial</h2></li>').appendTo('.first-col ul');
                    $('<li class="link2">' + data.r_antejardin + '</li>').appendTo('.first-col ul');
                    $('<li class="link3">' + data.r_patios + '</li>').appendTo('.first-col ul');
                    $('<li class="link4">' + data.r_fachadas + '</li>').appendTo('.first-col ul');
                    $('<li class="link5">' + data.r_cubiertas + '</li>').appendTo('.first-col ul');
                    $('<li class="link9">' + data.r_plazoletas_acceso + '</li>').appendTo('.first-col ul');

                    $('<li class="link6 title-sec-ov"><h2>Uso institucional</h2></li>').appendTo('.second-col ul');
                    $('<li class="link7">' + data.i_antejardin + '</li>').appendTo('.second-col ul');
                    $('<li class="link8">' + data.i_patios + '</li>').appendTo('.second-col ul');
                    $('<li class="link9">' + data.i_fachadas + '</li>').appendTo('.second-col ul');
                    $('<li class="link10">' + data.i_cubiertas + '</li>').appendTo('.second-col ul');
                    $('<li class="link9">' + data.i_plazoletas_acceso + '</li>').appendTo('.second-col ul');

                    $('<li class="link11 title-sec-ov"><h2>Uso comercial</h2></li>').appendTo('.third-col ul');
                    $('<li class="link1">' + data.c_antejardin + '</li>').appendTo('.third-col ul');
                    $('<li class="link2">' + data.c_patios + '</li>').appendTo('.third-col ul');
                    $('<li class="link3">' + data.c_fachadas + '</li>').appendTo('.third-col ul');
                    $('<li class="link4">' + data.c_cubiertas + '</li>').appendTo('.third-col ul');
                    $('<li class="link9">' + data.c_plazoletas_acceso + '</li>').appendTo('.third-col ul');

                    $('<li class="link5 title-sec-ov"><h2>Uso de servicios públicos</h2></li>').appendTo('.fourth-col ul');
                    $('<li class="link6">' + data.s_antejardin + '</li>').appendTo('.fourth-col ul');
                    $('<li class="link7">' + data.s_patios + '</li>').appendTo('.fourth-col ul');
                    $('<li class="link8">' + data.s_fachadas + '</li>').appendTo('.fourth-col ul');
                    $('<li class="link9">' + data.s_cubiertas + '</li>').appendTo('.fourth-col ul');
                    $('<li class="link9">' + data.s_plazoletas_acceso + '</li>').appendTo('.fourth-col ul');
                } else if (data.nombre_filtro == 'espacio_publico') {
                    $('<li class="link1">' + data.parques + '</li>').appendTo('.first-col ul');
                    $('<li class="link2">' + data.plazoletas + '</li>').appendTo('.first-col ul');
                    $('<li class="link3">' + data.jardines + '</li>').appendTo('.first-col ul');
                    $('<li class="link4">' + data.instalaciones_deportivas + '</li>').appendTo('.first-col ul');
                } else if (data.nombre_filtro == 'prevencion_de_riesgos') {
                    $('<li class="link1">' + data.barrera_visual + '</li>').appendTo('.first-col ul');
                    $('<li class="link2">' + data.barrera_acustica + '</li>').appendTo('.first-col ul');
                    $('<li class="link3">' + data.barrera_de_olores + '</li>').appendTo('.first-col ul');
                    $('<li class="link4">' + data.barrera_de_vientos + '</li>').appendTo('.first-col ul');
                    $('<li class="link5">' + data.cubrir_taludes + '</li>').appendTo('.first-col ul');
                    $('<li class="link6">' + data.ronda_hidrica + '</li>').appendTo('.first-col ul');
                }
            }
        });
    });

    $('body').on('click', '.close-overlay', function (event) {
        event.preventDefault();
        $('#overlay').removeAttr('class');
        $('body').removeClass('noscroll');
        $('#overlay').css('background-color', 'transparent');
        $('.first-col ul, .second-col ul, .third-col ul, .fourth-col ul, .fifth-col ul, .title-overlay').empty();
    });
});
