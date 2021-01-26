<template>
    <div class="modal__wrapper">
        <span class="title--30">{{__('Подтверждение')}}</span>
        <div class="signin-from__group">
            <p>
                {{ __(`На ваш E-mail отправлено письмо для подтверждения аккаунта. Пожалуйста перейдите по ссылке указанной в письме что бы завершить регистрацию.`) }}
            </p>
        </div>
        <form class="d-inline" method="POST"
              v-on:submit.prevent="resend"
        >
            <button type="submit" class="btn big"
                    :disabled="pending"
            >
                <span class="btn__titlte">{{__(pending ? 'Обработка...' : 'Отправить повторно')}}</span>
            </button>
        </form>
    </div>
</template>


<script>
    export default {
        name: 'Verify',
        props:{
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
                pending: false
            }
        },
        methods: {
            resend: function (){
                this.pending = true;

                axios.post(this.urls.verification,{
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
                            this.__(`На сервере произошла ошибка,
                            пожалуйста обновите страницу и
                            попробуйте еще раз`),
                                'error',
                                this.__('Ошибка')+'!'
                        );
                    })
                    .finally(() => {
                        setTimeout(() => {
                            this.pending = false;
                        }, 1000)
                    });
            },
        }
    }
</script>
