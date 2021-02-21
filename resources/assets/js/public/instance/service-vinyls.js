import VueRecaptcha from 'vue-recaptcha';
import VueSlider from 'vue-slider-component'

export default {
    components: { VueRecaptcha, VueSlider },
    data: function() {
        return {
            data: this.$store.state.data.content.body,
            policy: false,
            verify: null,
            input: {
                phone: null,
                shape: null,
                size: null,
                depth: null,
                package: 1,
                quantity: 1000,
                additionally: null,
                note: null
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
        },
        formData: function() {
            return {
                depth: this.data.local.depth,
                shape: this.data.local.shape
            }
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
