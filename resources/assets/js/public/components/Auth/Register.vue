<template>
    <div class="modal__wrapper">
        <span class="title--30">{{__('Регистрация')}}</span>
        <input type="text" class="input-base"
               :placeholder="__('Имя Фамилия')"
               v-model.trim="input.fullname"
        >
        <input type="text" class="input-base"
               :placeholder="__('Ваш e-mail')"
               v-model.trim="input.email"
        >
        <input type="password" class="input-base"
               :placeholder="__('Пароль')"
               v-model.trim="input.password"
        >
        <input type="password" class="input-base"
               :placeholder="__('Повторите пароль')"
               v-model.trim="input.password_confirmation"
        >
        <button type="submit" class="btn big"
                :disabled="pending"
        >
            <span class="btn__titlte">
                {{__(pending ? 'Обработка...' : 'Зарегистрироваться')}}
            </span>
        </button>
        <span class="btn-text"
              v-on:click="$emit('update:component', 'Login')"
        >
            {{__('Я уже зарегистрирован')}}
        </span>
    </div>
</template>


<script>
    export default {
        props:{
            token:{
                type: String,
                required: true
            },
            component:{
                type: String,
                required: true
            },
            urls:{
                type: Object,
                required: true
            }
        },
        name: 'Register',
        data: function() {
            return {
                action: this.path,
                verify: false,
                pending: false,
                input: {
                    _token: this.token,
                    fullname: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                }
            }
        },
        methods: {
            resend: function (){
                axios.post(this.urls.resend,{
                    _token: this.token
                })
                    .then(response => {
                        this.addNotify(
                            this.__('Письмо отправленно'),
                            'success',
                            this.__('Успешно')+'!'
                        );
                    })
                    .catch(error => {
                        this.addNotify(
                            this.__('На сервере произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз'),
                            'error',
                            this.__('Ошибка')+'!'
                        );
                    })
            },
            validatePassword: function (){
                if ( this.input.password !==  this.input.password_confirmation) {
                    this.addNotify(
                        this.__('Пароли не совпадают'),
                        'info',
                        this.__('Внимание')+'!'
                    );
                    return false;
                }
                if (this.input.password.length <= 7) {
                    this.addNotify(
                        this.__('Пароль должен содержать минимум 8 символов'),
                        'info',
                        this.__('Внимание')+'!'
                    );
                    return false;
                }
                return true;
            },
            validateEmail: function (){
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                if( reg.test(this.input.email) == false ) {
                    this.addNotify(
                        this.__('Не корректный Email'),
                            'info',
                        this.__('Внимание')+'!'
                    )
                    return false;
                }
                return true;
            },
            validate: function (){
                for ( var key in this.input ) {
                    if ( !this.input[key] ) {
                        this.addNotify(
                            this.__('Вы не заполнили обязательные поля'),
                            'info',
                            this.__('Внимание')+'!'
                        );
                        return false;
                    }
                }
                if ( !this.validatePassword() || !this.validateEmail() ) {
                    return false;
                }
                return true;
            },
            successSubmit: function (response){
                if ( response.status == 200 || response.status == 201 ) {
                    this.addNotify(
                        this.__('Вы успешно зарегистрировались'),
                        'success',
                        this.__('Успешно')+'!'
                    );
                    this.$emit('update:component', 'Verify')
                }else{
                    this.addNotify(
                        this.__('На сервере произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз'),
                        'error',
                        this.__('Ошибка')+'!');
                }
            },
            errorSubmit: function(error){
                var txt;
                switch (error.response.status) {
                    case 422:
                        txt = this.__(
                            `Такой пользователь уже существует`
                        );
                        break;
                    default:
                        txt = this.__(
                        `На сервере произошла ошибка,
                                    пожалуйста обновите страницу
                                    и попробуйте еще раз`
                        );
                        break;
                }
                this.addNotify(
                    txt,
                    'error',
                    this.__('Ошибка')+'!'
                );
            },
            submit: function() {
                if ( !this.validate() ) {
                    return false;
                }
                this.pending = true;
                axios.post(this.urls.register, this.input)
                .then(this.successSubmit)
                .catch(this.errorSubmit)
                .finally(() => {
                    setTimeout(() => {
                        this.pending = false;
                    }, 1000)
                });
            }
        }
    }
</script>
