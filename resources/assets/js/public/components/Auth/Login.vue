<template>
    <div class="modal__wrapper">
        <span class="title--30">{{__('Вход')}}</span>
        <input type="text" class="input-base"
               :placeholder="__('Ваш Email')"
               v-model="input.email"
        >
        <input type="password" class="input-base"
               :placeholder="__('Пароль')"
               v-model="input.password"
        >
        <div class="signin-from__group">
            <label class="checked" style="color: rgb(235, 87, 87);">
                <input type="checkbox" class="checked__inout"
                       v-model="input.remember"
                >
                <span class="checked__square"></span>
                <span class="checked__text">{{__('Запомнить меня')}}</span>
            </label>
            <span class="forgot-password"
                  v-on:click="$emit('update:component', 'Email')"
            >
                {{__('Забыл пароль')}}
            </span>
        </div>

        <button type="submit" class="btn big"
            :disabled="pending"
        >
            <span class="btn__titlte">{{__(pending ? 'Обработка...' : 'Войти')}}</span>
        </button>
        <span class="btn-text"
              v-on:click="$emit('update:component', 'Register')"
        >
            {{__('Регистрация')}}
        </span>
    </div>
</template>


<script>
    export default {
        props: {
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
            },
            user:{
                type: Object,
                required: true
            }
        },
        name: 'Login',
        data: function() {
            return {
                invalid: false,
                pending: false,
                userData: this.user,
                input: {
                    _token: this.token,
                    email: '',
                    password: '',
                    remember: false
                }
            }
        },
        methods: {
            redirect: function (role){
                switch(role){
                    case 'user':
                        setTimeout(() => {
                            window.location = '/'+ role;
                        }, 1500);
                        break;
                    default:
                        setTimeout(() => {
                            window.location = '/home';
                        }, 1500);
                        break;
                }

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
                    if ( typeof this.input[key] == 'string' && !this.input[key] ) {
                        this.addNotify(
                            this.__('Вы не заполнили обязательные поля'),
                            'info',
                            this.__('Внимание!')
                        );
                        return false;
                    }
                }
                if ( !this.validateEmail() ) {
                    return false;
                }

                return true
            },
            successSubmit: function(response){
                let user = response.data.user;
                if ( response.status === 200 && user.email_verified_at) {
                    this.addNotify(
                        this.__('Вы успешно авторизовались'),
                        'success',
                        this.__('Успешно')+'!'
                    );
                    this.redirect(user.role);
                }
                if (response.status === 200 && !user.email_verified_at) {
                    this.$set(this, 'userData', user);
                }
            },
            errorSubmit: function (error){
                if ( error.response.status == 500 ) {
                    var txt = this.__('На сервере произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз');
                }else{
                    var txt = this.__('Неверное сочетание логина и пароля');
                    this.invalid = true;
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
                axios.post(this.urls.login, this.input)
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
