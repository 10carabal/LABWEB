<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    @if (!empty($sheets))
        <title>RMA009 - {{Carbon\Carbon::now()->format("Ymd_His")}}</title>
    @else
        <title>RMA009</title>
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
                <b>LABORATORIO: </b>
                <span>{{$sheet->LABORATORIO}}</span>
            </li>
            <li>
                <b>FECHA EJECUCION: </b>
                <span>{{$sheet->FECHA_EJECUCION}}</span>
            </li>
            <li>
                <b>NOMBRE RESPONSABLE: </b>
                <span>{{$sheet->NOMBRE_RESPONSABLE}}</span>
            </li>
            <li>
                <b>CARGO RESPONSABLE: </b>
                <span>{{$sheet->CARGO_RESPONSABLE}}</span>
            </li>
            <li>
                <b>FUNCIONAMIENTO EQUIPO: </b>
                <span>{{$sheet->FUNCIONAMIENTO_EQUIPO}}</span>
            </li>
            <li>
                <b>ESTADO ENTORNO: </b>
                <span>{{$sheet->ESTADO_ENTORNO}}</span>
            </li>
            <li>
                <b>ESTADO ACCESORIO CONSUMIBLES: </b>
                <span>{{$sheet->ESTADO_ACCESORIO_CONSUMIBLES}}</span>
            </li>
            <li>
                <b>ESTADO LINEAS ALIMENTACION: </b>
                <span>{{$sheet->ESTADO_LINEAS_ALIMENTACION}}</span>
            </li>
            <li>
                <b>ESTADO ALMACENAMIENTO: </b>
                <span>{{$sheet->ESTADO_ALMACENAMIENTO}}</span>
            </li>
            <li>
                <b>DOCUMENTACION PRESENTE: </b>
                <span>{{$sheet->DOCUMENTACION_PRESENTE}}</span>
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
