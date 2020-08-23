@extends('admin.index')

@section('content')
	<div id="page-wrapper">
        <div class="graphs main__categories">
            <div class="xs">
                <h3>Новая Категория</h3>
                <div class="tab-content">
                    <div class="tab-pane active" id="horizontal-form">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form class="form-horizontal categories__admin-form"
                            method="POST" 
                            action="{{route('add-category')}}" 
                        >
                            @csrf
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
                                        required
                                        class="form-control1 categories__admin-input"
                                        id="focusedinput"
                                        placeholder="Назва Категорії"
                                    />
                                   
                                </div>
                                <div class="col-sm-8">
                                    <label
                                        for="categoryactive"
                                        class="col-sm-2 control-label"
                                        >Active</label
                                    > 
                                    <input type="checkbox" checked name="active" id="categoryactive"/>
                                </div>
                                <div class="col-sm-8 col-sm-offset-2">
                                    <button
                                        class="btn-success btn"
                                        type="submit"
                                    >
                                        Додати нову Категорію
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