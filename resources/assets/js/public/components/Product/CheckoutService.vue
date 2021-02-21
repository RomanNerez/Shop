<template>
    <transition name="overlay">
        <div class="overlay overlay--not-center"
             v-on:click.self="close"
             v-if="show"
        >
            <div class="desired-magnet">
                <form action="#" method="post">
                    <span class="title--30">{{ __('Заявка на изготовление') }}</span>

                    <div class="desired-magnet__contact row--wrap">
                        <span class="desired-magnet__title">{{ __('Контакты получателя') }}</span>

                        <input type="text" :placeholder="__('ФИО')" class="input-base">
                        <input type="text" :placeholder="__('Ваш город')" class="input-base">

                        <div class="input-base">
                            <vue-tel-input required
                                           :valid-characters-only="true"
                                           :placeholder="__('Номер телефона')"
                                           :preferred-countries="['UA', 'RU', 'BY', 'KZ']"
                                           wrapper-classes="phone-input"
                                           v-model="validate.phone.input"
                                           v-on:validate="validateNumber"
                            ></vue-tel-input>
                        </div>

                        <input type="text" placeholder="E-mail" class="input-base">
                    </div>

                    <span class="vinyl-magnets__divider"></span>

                    <div class="row--wrap">
                        <span class="desired-magnet__title">{{ __('Дополнительные комментарии') }}</span>
                        <textarea class="textarea-base" placeholder="Можете оставить свои пожелания или комментарии к заказу"></textarea>
                    </div>

                    <span class="vinyl-magnets__divider"></span>

                    <div class="row--wrap">
                        <span class="desired-magnet__title">{{ __('Дополнительные материалы') }}</span>

                        <input type="text" class="input-base" placeholder="Ссылка на файл">

                        <span class="vinyl-magnets__add-file-subtitle">{{ __('Вы можете приложить изображение/логотип которое нужно нанести на изделие. Это должен быть векторный файл в формате EPS, AI или CDR (версия 12). Весь текст должен быть переведён в кривые.') }}</span>
                    </div>

                    <div class="desired-magnet__btn-group">
                        <button type="button" class="btn big"
                                :disabled="check"
                        >
                            <span class="btn__titlte">{{ __('Отправить заявку на изготовление') }}</span>
                        </button>

                        <vue-recaptcha
                            sitekey="6LdzcwcaAAAAAIIjbHBqhkj3r9Fw90aOM6SplPNb"
                            :load-recaptcha-script="true"
                            v-on:verify="onVerify"
                            v-on:expired="onExpired"
                        >
                        </vue-recaptcha>
                    </div>

                    <label class="checked red">
                        <input type="checkbox" class="checked__inout"
                               v-model="policy"
                        />
                        <span class="checked__square"></span>
                        <span class="checked__text">{{ __('Я принимаю правила') }} <a href="#">{{ __('политики конфиденциальности') }}</a></span>
                    </label>
                </form>
            </div>
        </div>
    </transition>
</template>

<script>
    import VueRecaptcha from 'vue-recaptcha';

    export default {
        props: ['show'],
        components: { VueRecaptcha },
        data: function () {
            return {
                policy: false,
                verify: null,
                input: {
                    phone: null
                },
                validate: {
                    phone: {
                        input: null,
                        valid: false,
                        invalid: null
                    }
                }
            }
        },
        computed: {
            check: function () {
                return !this.policy || !this.verify
            }
        },
        methods: {
            validateNumber: function (data) {
                this.validate.phone.valid = data.valid;
                this.input.phone = data.number.international;
            },
            onVerify: function (recaptchaToken) {
                this.verify = recaptchaToken;
            },
            onExpired: function () {
                this.verify = null;
            },
            close: function () {
                this.$emit('update:show', false);
            }
        }
    }
</script>
