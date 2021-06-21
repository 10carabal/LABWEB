<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    @if (!empty($sheets))
        <title>RMA006 - {{Carbon\Carbon::now()->format("Ymd_His")}}</title>
    @else
        <title>RMA006</title>
    @endif

    <style>
        .data_list{
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        .title, .data_list li{
            text-align: center;
        }
        .sheet_container{
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
    <h2 class="title">Datos del formato</h2>
    @foreach ($sheets as $sheet)
    <div class="sheet_container">
        <ul class="data_list">
            <li>
                <b>ID: </b>
                <span>{{$sheet->ID}}</span>
            </li>
            <li>
                <b>NUM HOJA VIDA: </b>
                <span>{{$sheet->NUM_HOJA_VIDA}}</span>
            </li>
            <li>
                <b>CONSECUTIVO ORDEN: </b>
                <span>{{$sheet->CONSECUTIVO_ORDEN}}</span>
            </li>
            <li>
                <b>TIPO MANTENIMIENTO: </b>
                <span>{{$sheet->TIPO_MANTENIMIENTO}}</span>
            </li>
            <li>
                <b>IMAGEN ANTES MANTENIMIENTO: </b><br/>
                {{--<span>{{$sheet->IMAGEN_ANTES_MANTENIMIENTO}}</span>--}}
                @php
                    if (file_exists(public_path("images/".$sheet->IMAGEN_ANTES_MANTENIMIENTO))) {
                        echo "<img src='".public_path("images/".$sheet->IMAGEN_ANTES_MANTENIMIENTO)."'/>";
                    }
                @endphp
            </li>
            <li>
                <b>IMAGEN DESPUES MANTENIMIENTO: </b><br/>
                {{--<span>{{$sheet->IMAGEN_DESPUES_MANTENIMIENTO}}</span>--}}
                @php
                    if (file_exists(public_path("images/".$sheet->IMAGEN_ANTES_MANTENIMIENTO))) {
                        echo "<img src='".public_path("images/".$sheet->IMAGEN_DESPUES_MANTENIMIENTO)."'/>";
                    }
                @endphp
            </li>
            <li>
                <b>FECHA MANTENIMIENTO: </b>
                <span>{{$sheet->FECHA_MANTENIMIENTO}}</span>
            </li>
            <li>
                <b>HORA INICIO: </b>
                <span>{{$sheet->HORA_INICIO}}</span>
            </li>
            <li>
                <b>HORA FIN: </b>
                <span>{{$sheet->HORA_FIN}}</span>
            </li>
            <li>
                <b>TIPO EQUIPO: </b>
                <span>{{$sheet->TIPO_EQUIPO}}</span>
            </li>
            <li>
                <b>ACTIVIDADES REALIZADAS: </b>
                <span>{{$sheet->ACTIVIDADES_REALIZADAS}}</span>
            </li>
            <li>
                <b>OBSERVACION MANTENIMIENTO: </b>
                <span>{{$sheet->OBSERVACION_MANTENIMIENTO}}</span>
            </li>
            <li>
                <b>ESTADO EQUIPO: </b>
                <span>{{$sheet->ESTADO_EQUIPO}}</span>
            </li>
            <li>
                <b>TEST FUNCIONALIDAD: </b>
                <span>{{$sheet->TEST_FUNCIONALIDAD}}</span>
            </li>
            <li>
                <b>LIMPIEZA: </b>
                <span>{{$sheet->LIMPIEZA}}</span>
            </li>
            <li>
                <b>REEMPLAZO ACCESORIOS: </b>
                <span>{{$sheet->REEMPLAZO_ACCESORIOS}}</span>
            </li>
            <li>
                <b>HERRAMIENTAS UTILIZADAS: </b>
                <span>{{$sheet->HERRAMIENTAS_UTILIZADAS}}</span>
            </li>
            <li>
                <b>EQUIPO PROTECCION PERSONAL: </b>
                <span>{{$sheet->EQUIPO_PROTECCION_PERSONAL}}</span>
            </li>
            <li>
                <b>NOMBRE RESPONSABLE MENTO: </b>
                <span>{{$sheet->NOMBRE_RESPONSABLE_MENTO}}</span>
            </li>
            <li>
                <b>CARGO RESPONSABLE MENTO: </b>
                <span>{{$sheet->CARGO_RESPONSABLE_MENTO}}</span>
            </li>
            <li>
                <b>NOMBRE RESPONSABLE RECIBIR: </b>
                <span>{{$sheet->NOMBRE_RESPONSABLE_RECIBIR}}</span>
            </li>
            <li>
                <b>CARGO RESPONSABLE RECIBIR: </b>
                <span>{{$sheet->CARGO_RESPONSABLE_RECIBIR}}</span>
            </li>
            <li>
                <b>CREATED AT: </b>
                <span>{{$sheet->CREATED_AT}}</span>
            </li>
            <li>
                <b>UPDATED AT: </b>
                <span>{{$sheet->UPDATED_AT}}</span>
            </li>
        </ul>
    </div>
    @endforeach
</body>
</html>
