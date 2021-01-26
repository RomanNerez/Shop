<template>
    <div class="modal__wrapper">
        <span class="title--30">
            {{__('Восстановление пароля')}}
        </span>
        <input type="text" class="input-base"
               :placeholder="__('Ваш email')"
               v-model="input.email"
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
                {{__(pending ? 'Обработка...' : 'Изменить пароль')}}
            </span>
        </button>
        <span class="btn-text"
              v-on:click="$emit('update:component', 'Login')"
        >
            {{__('Отмена')}}
        </span>
    </div>
</template>


<script>
    export default {
        name: 'Reset',
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
        data: function() {
            return {
                pending: false,
                input: {
                    _token: this.token,
                    email: '',
                    token: '',
                    password: '',
                    password_confirmation: ''
                }
            }
        },
        mounted: function() {
          this.checkReset();
        },
        methods: {
            checkReset: function (){
                var url = new URL(window.location.href);
                if (url.searchParams.has('token')){
                    this.status = 'reset'
                    let newKey = ['email', 'token', 'password', 'password_confirmation'];
                    newKey.forEach((key)=>{
                        this.$set(this.input, key, url.searchParams.get(key))
                    })
                }
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
                if ( response.status == 200 || response.status == 204 ) {
                    this.addNotify(
                        this.__('Пароль успешно был изменён'),
                        'success',
                        this.__('Успешно')+'!'
                    );
                    this.$root.auth.show = false;
                    setTimeout(()=>{
                        window.location.reload()
                    },1500)
                }else{
                    this.addNotify('На сервере произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз', 'error', 'Ошибка!');
                }
            },
            errorSubmit: function (error){
                if ( error.response.status == 500 ) {
                    var txt = 'На сервере произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз';
                }else{
                    var txt = 'Неверное сочетание логина и пароля';
                    this.invalid = true;
                }
                this.addNotify(txt, 'error', 'Ошибка!');
            },
            submit: function() {
                if ( !this.validate() ) {
                    return false;
                }
                this.pending = true;
                axios.post(this.urls.resetPassword, this.input)
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
