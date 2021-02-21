<template>
    <form method="POST" v-on:submit.prevent="submit">
        <div class="login__row" :class="{'valid-error': invalid}">
            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
            </svg>
            <input type="text" class="login__input name" name="name" v-model="input.name" placeholder="Логин"/>
        </div>
        <div class="login__row" :class="{'valid-error': invalid}">
            <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
            </svg>
            <input type="password" class="login__input pass" name="password" v-model="input.password" placeholder="Пароль"/>
        </div>
        <button type="submit" class="login__submit" :disabled="pending" :class="{processing: pending}">Войти</button>
    </form>
</template>

<script>
    export default {
        props: ['token', 'path'],
        data: function() {
            return {
                invalid: false,
                pending: false,
                action: this.path,
                input: {
                    _token: this.token,
                    name: '',
                    password: ''
                }
            }
        },
        methods: {
            submit: function() {
                for ( var key in this.input ) {
                    if ( !this.input[key] ) {
                        this.invalid = true;
                        addNotify('Вы не заполнили обязательные поля', 'info', 'Внимание!');

                        return;
                    }
                }

                if ( this.invalid ) {
                    this.invalid = false;
                }

                this.pending = true;
                axios.post(this.action, this.input)
                    .then(response => {
                        if ( response.status == 200 || response.status == 204 ) {
                            addNotify('Вы успешно авторизовались', 'success', 'Успешно!');
                            setTimeout(function() {
                                location.reload();
                            }, 1500)
                        }else{
                            addNotify('На сервере произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз', 'error', 'Ошибка!');
                        }
                    })
                    .catch(error => {
                        if ( error.response.status == 500 ) {
                            var txt = 'На сервере произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз';
                        }else{
                            var txt = 'Неверное сочетание логина и пароля';
                            this.invalid = true;
                        }
                        addNotify(txt, 'error', 'Ошибка!');
                    })
                    .finally(() => {
                        setTimeout(() => {
                            this.pending = false;
                        }, 1000)
                    });
            }
        }
    }
</script>

