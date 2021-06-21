<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    @if (!empty($sheets))
        <title>RMA008 - {{Carbon\Carbon::now()->format("Ymd_His")}}</title>
    @else
        <title>RMA008</title>
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
                <b>CODIGO PRESTADOR: </b>
                <span>{{$sheet->CODIGO_PRESTADOR}}</span>
            </li>
            <li>
                <b>SERVICIO: </b>
                <span>{{$sheet->SERVICIO}}</span>
            </li>
            <li>
                <b>UBICACION: </b>
                <span>{{$sheet->UBICACION}}</span>
            </li>
            <li>
                <b>FECHA INFORME: </b>
                <span>{{$sheet->FECHA_INFORME}}</span>
            </li>
            <li>
                <b>PROBLEMA DETECTADO: </b>
                <span>{{$sheet->PROBLEMA_DETECTADO}}</span>
            </li>
            <li>
                <b>ACTIVIDADES REALIZADAS: </b>
                <span>{{$sheet->ACTIVIDADES_REALIZADAS}}</span>
            </li>
            <li>
                <b>REPUESTOS INSTALADOS: </b>
                <span>{{$sheet->REPUESTOS_INSTALADOS}}</span>
            </li>
            <li>
                <b>ACCESORIOS INSTALADOS: </b>
                <span>{{$sheet->ACCESORIOS_INSTALADOS}}</span>
            </li>
            <li>
                <b>INSUMOS INSTALADOS: </b>
                <span>{{$sheet->INSUMOS_INSTALADOS}}</span>
            </li>
            <li>
                <b>MEDICIONES: </b>
                <span>{{$sheet->MEDICIONES}}</span>
            </li>
            <li>
                <b>OBSERVACIONES: </b>
                <span>{{$sheet->OBSERVACIONES}}</span>
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
