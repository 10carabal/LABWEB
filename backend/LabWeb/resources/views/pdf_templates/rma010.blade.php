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
                <b>FECHA SOLICITUD: </b>
                <span>{{$sheet->FECHA_SOLICITUD}}</span>
            </li>
            <li>
                <b>DESCRIPCION SOLICITUD: </b>
                <span>{{$sheet->DESCRIPCION_SOLICITUD}}</span>
            </li>
            <li>
                <b>CDIS PRESUPUESTO: </b>
                <span>{{$sheet->CDIS_PRESUPUESTO}}</span>
            </li>
            <li>
                <b>FECHA EJECUCION: </b>
                <span>{{$sheet->FECHA_EJECUCION}}</span>
            </li>
            <li>
                <b>EJECUTADO: </b>
                <span>{{$sheet->EJECUTADO}}</span>
            </li>
            <li>
                <b>NO EJECUTADO: </b>
                <span>{{$sheet->NO_EJECUTADO}}</span>
            </li>
            <li>
                <b>PERSONAL ENCARGADO: </b>
                <span>{{$sheet->PERSONAL_ENCARGADO}}</span>
            </li>
            <li>
                <b>TOTAL SOLICITUDES: </b>
                <span>{{$sheet->TOTAL_SOLICITUDES}}</span>
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

