@extends('admin.index')

@section('content')
    <div id="page-wrapper">
        <div class="xs">
            <div class="well1 white">
                <div class="admin__title">
                    <h3>Товари</h3>
                    <a class="btn" href="{{route('admin-product-add')}}"
                        >+ Додати товар</a
                    >
                </div>
                <form action="#">
                    <div class="form-group">
                        <label class="control-label">
                            <b>Категорія</b></label
                        >
                        <select
                            class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched"
                            ng-model="model.email"
                            required=""
                        >
                            <option value=""
                                >Чехли для мобільних телефонів</option
                            >
                            <option value="">Кабелі</option>
                            <option value="">Зарядні пристрої</option>
                            <option value="">Захист екрану</option>
                            <option value="">Музика</option>
                            <option value="">Носимі пристрої</option>
                            <option value="">Інше</option>
                        </select>
                    </div>
                </form>
                <div class="graphs main__categories">
                    <div class="xs">
                        <div
                            class="panel panel-warning"
                            data-widget='{"draggable": "false"}'
                            data-widget-static=""
                        >
                            <div class="panel-heading">
                                <h2>Чехли для мобільних телефонів</h2>
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="warning">
                                            <th>#</th>
                                            <th>Фото</th>
                                            <th>Назва</th>
                                            <th>Артикль</th>
                                            <th>Кількість</th>
                                            <th>Видимість</th>
                                            <th>Керування</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img
                                                    src="{{asset('images/1.png')}}"
                                                    alt=""
                                                    width="40px"
                                                />
                                            </td>
                                            <td>
                                                Чехли для iPhone 11
                                            </td>
                                            <td>1110001</td>
                                            <td>
                                                <span>1</span>
                                            </td>
                                            <td>
                                                <label
                                                    for="product__active"
                                                    class="product__switch"
                                                >
                                                    <input
                                                        type="checkbox"
                                                        id="product__active"
                                                    />
                                                    <i></i>
                                                </label>
                                            </td>
                                            <td>
                                                <button
                                                    class="btn product__edit"
                                                ></button>
                                                <button
                                                    class="btn product__delete"
                                                ></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection