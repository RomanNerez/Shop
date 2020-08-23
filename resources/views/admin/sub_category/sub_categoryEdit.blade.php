@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="graphs cable__categories">
            <div class="xs">
                <div class="admin__title">
                    <h3>Редактирование Подкатегории</h3>
                    <a class="btn" href="{{route('admin-sub_categories')}}">
                        Отмена
                    </a>
                </div>
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
                            action="{{route('edit-sub_category', ['id' => $data['item']->id])}}" 
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
                                        @foreach($data['categories'] as $category)
                                            <option
                                                value="{{$category->id}}"
                                                @if($category->id === $data['item']->categories_id) checked @endif
                                            >{{$category->title}}</option>
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
                                        value="{{$data['item']->title}}"
                                        placeholder="Назва Подкатегорії"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                    for="categoryactive"
                                    class="col-sm-2 control-label"
                                >
                                    Active
                                </label> 
                                <div class="col-sm-8">
                                    
                                    <input type="checkbox"  name="active" id="categoryactive"
                                        @if($data['item']->active)checked @endif
                                    />
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