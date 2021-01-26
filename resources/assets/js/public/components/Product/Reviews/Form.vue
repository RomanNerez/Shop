<template>
    <slide-up-down :active="show"
                   :duration="250"
    >
        <div class="add-review">
            <span class="title--30">{{ __('Добавить отзыв') }}</span>
            <span class="add-review__subtitle">{{ __('оставьте ваш отзыв о товаре или комментарий') }}</span>

            <form action="#" method="post" v-on:submit.prevent="send">
                <div class="add-review__row">
                    <div class="add-review__colum">
                        <input name="name" type="text" class="input-base"
                               :placeholder="__('Ваше имя')"
                               v-model.trim="input.name"
                               :class="{invalid: checkValid('name')}"
                        />
                        <input name="email" type="email" class="input-base"
                               :placeholder="__('Ваш еmail')"
                               v-model.trim="input.email"
                               :class="{invalid: checkValid('email')}"
                        />
                    </div>
                    <div class="add-review__colum">
                        <textarea name="message" class="textarea-base"
                                  :placeholder="__('Комментарий')"
                                  v-model.trim="input.message"
                                  :class="{invalid: checkValid('message')}"
                        ></textarea>
                    </div>
                </div>

                <div class="add-review__row">
                    <div class="add-review__colum">
                        <!--<span class="add-review__text">Введите проверочный код</span>-->
                        <div class="add-review__captcha">
                            <vue-recaptcha
                                sitekey="6LdzcwcaAAAAAIIjbHBqhkj3r9Fw90aOM6SplPNb"
                                :loadRecaptchaScript="true"
                                v-on:verify="onVerify"
                                v-on:expired="onExpired"
                            >
                            </vue-recaptcha>
                        </div>
                    </div>
                    <div class="add-review__colum">
                        <span class="add-review__text">{{ __('Ваша оценка') }}</span>
                        <div class="star-group">
                            <div class="star"
                                 v-for="star in 5"
                                 :class="{active: star <= rating}"
                                 v-on:mouseenter="rating = star"
                                 v-on:mouseleave="rating = input.rating"
                                 v-on:click="input.rating = star"
                            >
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="#F65353" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 5.7292L9.54964 5.35696L7.49701 0L5.44439 5.35696L0 5.7292L4.1758 9.41256L2.80553 15L7.49701 11.9194L12.1885 15L10.8183 9.41256L15 5.7292Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="add-review__row">
                    <button type="submit" class="btn big">
                        <span class="btn__titlte">{{ __(pending ? 'обработка...' : 'отправить отзыв') }}</span>
                    </button>
                    <div class="add-review__valid" v-show="checkVerify">
                        <p>{{ __('подтвердите что вы не робот') }}</p>
                    </div>
                </div>
            </form>
        </div>
    </slide-up-down>
</template>

<script>
    import VueRecaptcha from 'vue-recaptcha';

    export default {
        props: ['product', 'show'],
        data: function() {
            return {
                pending: false,
                verify: null,
                invalid: false,
                rating: 5,
                input: {
                    rating: 5,
                    name: '',
                    email: '',
                    message: ''
                }
            }
        },
        components: { VueRecaptcha },
        computed: {
            path: function () {
                return window.origin +'/product/'+ this.product +'/review';
            },
            checkVerify: function () {
                return this.invalid && !this.verify
            }
        },
        methods: {
            onVerify: function (recaptchaToken) {
                this.verify = recaptchaToken;
            },
            onExpired: function () {
                this.verify = null;
            },
            validate: function() {
                let items = Object.values(this.input),
                    check = Object.values(this.input).filter(item => {
                        return item !== '';
                    });

                if (items.length !== check.length || !this.verify) {
                    this.invalid = true;
                }else{
                    this.invalid = false;
                }

                return !this.invalid;
            },
            send: function () {
                if ( this.validate() ) {
                    this.pending = true;

                    axios.post(this.path, {
                        data: this.input
                    })
                    .then((response) => {
                        this.$emit('update:show', false);
                        this.$store.commit('addReview', response.data);

                        this.rating = 5;
                        this.input.rating = 5;
                        this.input.name = '';
                        this.input.email = '';
                        this.input.message = '';
                    })
                    .catch(() => {
                        this.$notify({
                            group: 'foo',
                            type: 'error',
                            title: this.__('Произошла ошибка'),
                            text: this.__('Во время обработки запроса произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз')
                        });
                    })
                    .finally(() => {
                        this.pending = false;
                    })
                }
            },
            checkValid: function (key) {
                return this.input[key] === '' && this.invalid;
            }
        }
    }
</script>
