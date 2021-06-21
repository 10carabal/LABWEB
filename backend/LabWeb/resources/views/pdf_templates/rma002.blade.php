<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    @if (!empty($sheet))
        <title>RMA002 - {{$sheet->ID}}</title>
    @else
        <title>RMA002</title>
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
    </style>
</head>
<body>
    <h2 class="title">Datos del formato</h2>
    <ul class="data_list">
        <li>
            <b>ACCESORIOS_EQUIPO: </b>
            <span>{{$sheet->ACCESORIOS_EQUIPO}}</span>
        </li>
        <li>
            <b>ANTES_USO: </b>
            <span>{{$sheet->ANTES_USO}}</span>
        </li>
        <li>
            <b>CREATED_AT: </b>
            <span>{{$sheet->CREATED_AT}}</span>
        </li>
        <li>
            <b>DESPUES_USO: </b>
            <span>{{$sheet->DESPUES_USO}}</span>
        </li>
        <li>
            <b>ID: </b>
            <span>{{$sheet->ID}}</span>
        </li>
        <li>
            <b>NUM_HOJA_VIDA: </b>
            <span>{{$sheet->NUM_HOJA_VIDA}}</span>
        </li>
        <li>
            <b>PARTES_EQUIPO: </b>
            <span>{{$sheet->PARTES_EQUIPO}}</span>
        </li>
        <li>
            <b>TECNOVIGILANCIA: </b>
            <span>{{$sheet->TECNOVIGILANCIA}}</span>
        </li>
        <li>
            <b>UPDATED_AT: </b>
            <span>{{$sheet->UPDATED_AT}}</span>
        </li>
    </ul>
</body>
</html>
