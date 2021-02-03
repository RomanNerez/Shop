import VueRecaptcha from 'vue-recaptcha';
import VueSlider from 'vue-slider-component'

export default {
    components: { VueRecaptcha, VueSlider },
    data: function() {
        return {
            policy: false,
            verify: null,
            input: {
                phone: null,
                shape: null,
                material: null,
                cover: null,
                mark: null,
                power: null,
                additionally: null,
                note: null,
                quantity: 1000,
                term: 30
            },
            options: {
                range: {
                    tooltip: 'none',
                    height: 5,
                    dotSize: 24
                }
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
        }
    }
};