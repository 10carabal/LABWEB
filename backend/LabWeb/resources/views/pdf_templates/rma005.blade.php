<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    @if (!empty($sheets))
        <title>RMA005 - {{Carbon\Carbon::now()->format("Ymd_His")}}</title>
    @else
        <title>RMA005</title>
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
                <b>FCIA VACION CALIB: </b>
                <span>{{$sheet->FCIA_VACION_CALIB}}</span>
            </li>
            <li>
                <b>FECHA EJECUCION: </b>
                <span>{{$sheet->FECHA_EJECUCION}}</span>
            </li>
            <li>
                <b>ESTADO EJECUCION: </b>
                <span>{{$sheet->ESTADO_EJECUCION}}</span>
            </li>
            <li>
                <b>OBSERVACIONES EQUIPO: </b>
                <span>{{$sheet->OBSERVACIONES_EQUIPO}}</span>
            </li>
            <li>
                <b>CONSECUTIVO ORDEN: </b>
                <span>{{$sheet->CONSECUTIVO_ORDEN}}</span>
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
