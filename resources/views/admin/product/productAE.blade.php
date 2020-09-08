@extends('admin.index')

@section('content')
   <div id="page-wrapper">
        <div class="xs">
            <div class="well1 white">
                <div class="admin__title">
                    <h3>Додати Товар</h3>
                    <a class="btn" href="{{route('admin-product')}}"
                        >Назад</a
                    >
                </div>
                
                <form
                    class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern"
                    novalidate="novalidate"
                    ng-submit="submit()"
                >
                    <fieldset>
                        <div class="form-group">
                            <label class="control-label"> <b>Назва</b> </label>
                            <input
                                type="text"
                                class="form-control1 ng-invalid ng-invalid-required ng-touched"
                                ng-model="model.name"
                                required=""
                            />
                        </div>
                        <div class="form-group">
                            <label class="control-label"
                                > <b>Категорія</b></label
                            >
                            <select
                                class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched"
                                ng-model="model.email"
                                required=""
                            >
                                <option value=""
                                    >Чехли для мобільних
                                    телефонів</option
                                >
                                <option value="">Кабелі</option>
                                <option value=""
                                    >Зарядні пристрої</option
                                >
                                <option value="">Захист екрану</option>
                                <option value="">Музика</option>
                                <option value=""
                                    >Носимі пристрої</option
                                >
                                <option value="">Інше</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"></label>
                                <b>Підкатегорія</b>
                            </label>
                            <select
                                class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched"
                                ng-model="model.email"
                                required=""
                            >
                                <option value=""
                                    >Чехли для мобільних
                                    телефонів</option
                                >
                                <option value="">Кабелі</option>
                                <option value=""
                                    >Зарядні пристрої</option
                                >
                                <option value="">Захист екрану</option>
                                <option value="">Музика</option>
                                <option value=""
                                    >Носимі пристрої</option
                                >
                                <option value="">Інше</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label"><b>Кількість на складі</b></label>
                            <input
                                type="number"
                                class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched"
                                ng-model="model.number"
                                ng-pattern="/[0-9]/"
                                required=""
                            />
                            <p class="help-block hint-block">
                                Numeric values from 0-***
                            </p>
                        </div>
                        <div class="form-group">
                            <label class="control-label normal"
                                > <b>Дата створення</b></label
                            >
                            <input
                                type="date"
                                class="form-control1 ng-invalid ng-invalid-required"
                                ng-model="model.date"
                                required=""
                            />
                        </div>
                        <div class="form-group">
                            <div class="checkbox1">
                                <label>
                                    <input
                                        type="checkbox"
                                        ng-model="model.winner"
                                        required=""
                                        class="ng-invalid ng-invalid-required"
                                    />
                                    <b>Помітка "Новинка"</b> 
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="choose-photo">Вибрати фото товару (max. 5 шт.)</label>
                            <input type="file" id="choose-photo" multiple>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button>
                        </div>
                        <div class="form-group">
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                Submit
                            </button>
                            <button
                                type="reset"
                                class="btn btn-default"
                            >
                                Reset
                            </button>
                        </div>
                       
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection