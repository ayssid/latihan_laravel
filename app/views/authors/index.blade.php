@extends('layouts.master')

@section('asset')
    @include('layouts.partials.datatable')
@stop

@section('title')
    {{ $title }}
@stop



@section('breadcrumb')
<li>Dashboard</li>
<li>{{ $title }}</li>
@stop

@section('content')
{{ Html::buttonAdd() }} <br>
{{
  Datatable::table()
  ->addColumn('id', 'nama', '')
  ->setOptions('aoColumnDefs', array(
            array(
                'bVisible' => false,
                'aTargets' => [0],
            ),
            array(
                'sTitle' => 'Nama',
                'aTargets' => [1],
            ),
            array(
                'bSortable' => false,
                'aTargets' => [2],
            ),
            )
    )
    ->setOptions('bProcessing', true)
    ->setUrl(route('admin.authors.index'))
    ->render('datatables.uikit')
    
}}
@stop