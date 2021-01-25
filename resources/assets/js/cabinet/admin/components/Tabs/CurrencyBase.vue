<template>
    <v-container class="pa-0">
        <v-row>
            <v-col class="pt-0 pr-5">
                <v-text-field
                    v-model.trim="value.code"
                    label="Код валюты"
                    color="green"
                    :counter="5"
                    outlined
                    :error-messages="codeErrors"
                ></v-text-field>
            </v-col>
            <v-col class="pt-0 pl-5">
                <v-text-field
                    v-model="value.symbol"
                    label="Символ валюты"
                    color="green"
                    :counter="3"
                    outlined
                    :error-messages="requiredErrors('symbol')"
                ></v-text-field>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import { validationMixin } from 'vuelidate';
    import { required, maxLength } from 'vuelidate/lib/validators';

	export default{
        props:['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect'],
        validations: function () {
            let value = {
                    code: {
                        required,
                        regexp: function (val) {
                            return !!val.match(/[^0-9a-z\-]+/gi);
                        }
                    },
                    symbol: {
                        required
                    }
                },
                isStatus = false;
            return { value };
        },
		data: function() {
			return {
                content: this.value,
			}
		},
        computed: {
            codeErrors: function () {
                const errors = []
                this.$v.value.code.regexp && errors.push('Допускаются только цифры и буквы латинского алфавита')
                if (!this.$v.value.code.$dirty) return errors
                if (this.$v.value.code.required !== undefined) {
                    !this.$v.value.code.required && errors.push('Это поле обязательное!')
                };

                return errors
            },
        },
        methods:{
            validate: function () {
                this.$v.value.$touch();

                if (!this.$v.value.code.required || !this.$v.value.symbol.required) {
                    this.$emit('update:tabSelect', 0);
                    this.$emit('update:select', this.langs[0].id);
                    return false;
                }

                return true;
            },
            handleInput (e) {
                this.$emit('input', this.content)
            },
            requiredErrors: function (key) {
                const errors = [];

                if (!this.$v.value[key].$dirty) return errors
                if (this.$v.value[key].required !== undefined) {
                    !this.$v.value[key].required && errors.push('Это поле обязательное!')
                }
                return errors
            },
        }
	}
</script>
