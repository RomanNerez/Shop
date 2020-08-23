@extends('admin.index')

@section('content')
	<div id="page-wrapper">
        <div class="graphs cable__categories">
            <div class="xs">
                <div class="admin__title">
                    <h3>Подкатегории</h3>
                    <a class="btn" href="{{route('display-add-sub_category')}}">
                        + Добавить подкатегорию
                    </a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div
                    class="panel panel-warning"
                    data-widget='{"draggable": "false"}'
                    data-widget-static=""
                >
                    <div class="panel-heading">
                        <h2>freez.com.ua</h2>
                        <div
                            class="panel-ctrls"
                            data-actions-container=""
                            data-action-collapse='{"target": ".panel-body"}'
                        >
                            <span class="button-icon has-bg"
                                ><i class="ti ti-angle-down"></i
                            ></span>
                        </div>

                    </div>

                    <div
                        class="panel-body no-padding"
                        style="display: block;"
                    >
                    @if(count($data['categories']))
                        <table class="table table-striped">
                            <thead>
                                <tr class="warning">
                                    <th>#</th>
                                    <th>Категорія</th>
                                    <th>Підкатегорія</th>
                                    <th>Дата створення</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['sub_categories'] as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->category[0]->title}}</td>
                                        <td>
                                            {{$item->title}}
                                        </td>
                                        <td>
                                            <time datetime="06/08/2020"
                                                >{{$item->created_at}}</time
                                            >
                                        </td>
                                        <td>@if($item->active) active @else no-active @endif</td>
                                        <td>
                                            <a href="{{route('display-edit-sub_category', ['id' => $item->id])}}">
                                                <button
                                                    class="btn product__edit"
                                                ></button>
                                            </a>
                                            <a href="{{route('delete-sub_category', ['id' => $item->id])}}">
                                                <button
                                                    class="btn product__delete"
                                                ></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data['sub_categories']->links() }}
                        @else
                            <div class="alert alert-info" role="alert">Подкатегорий нет</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection