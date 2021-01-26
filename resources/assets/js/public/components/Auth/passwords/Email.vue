<template>
    <div class="modal__wrapper">
        <span class="title--30">
            {{__('Восстановление пароля')}}
        </span>
        <input type="text" class="input-base"
               :placeholder="__('Ваш email')"
               v-model="input.email"
        >
        <button type="submit" class="btn big"
                :disabled="pending"
        >
            <span class="btn__titlte">
                {{__(pending ? 'обработка...' : 'сбросить пароль')}}
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
        name: 'Email',
        props: {
            token:{
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
                    email: ''
                }
            }
        },
        methods: {
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
            successSubmit: function (response){
                if ( response.status == 200 || response.status == 204 ) {
                    this.addNotify(
                        this.__('Мы отправили вам ссылку для сброса пароля по электронной почте!'),
                        'success',
                        this.__('Успешно')+'!'
                    );
                    this.$root.auth.show = false;
                }else{
                    this.addNotify(
                        this.__('На сервере произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз'),
                        'error',
                        this.__('Ошибка')+'!'
                    );
                }
            },
            errorSubmit: function (error){
                if ( error.response.status == 500 ) {
                    var txt = this.__('На сервере произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз');
                }else{
                    var txt = this.__('Неверное сочетание логина и пароля');
                }
                this.addNotify(txt, 'error', 'Ошибка!');
            },
            submit: function() {
                if ( !this.validateEmail() ) {
                    return false;
                }
                this.pending = true;
                axios.post(this.urls.email, this.input)
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
