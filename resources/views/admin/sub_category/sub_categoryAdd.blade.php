@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="graphs cable__categories">
            <div class="xs">
                <h3>Новая Подкатегория</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal categories__admin-form"
                            method="POST"
                            action="{{route('add-sub_category')}}" 
                        >
                            @csrf
                            <div class="form-group">
                                <label
                                    for="focusedinput"
                                    class="col-sm-2 control-label"
                                    >Категорія</label
                                >
                                <div class="col-sm-8">
                                    <select
                                        type="select"
                                        name="categories_id"
                                        class="form-control1 categories__admin-input"
                                        id="focusedinput"
                                        placeholder="Категория"
                                        required
                                    >
                                        @foreach($data['categories'] as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="focusedinput"
                                    class="col-sm-2 control-label"
                                    >Нова Категорія</label
                                >
                                <div class="col-sm-8">
                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control1 categories__admin-input"
                                        id="focusedinput"
                                        required
                                        placeholder="Назва Подкатегорії"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="categoryactive"
                                    class="col-sm-2 control-label"
                                    >Active</label
                                > 
                                <div class="col-sm-8">
                                    <input type="checkbox" checked name="active" id="categoryactive"/>
                                </div>
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button
                                        class="btn-success btn"
                                        type="submit"
                                    >
                                        Додати нову підкатегорію
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
