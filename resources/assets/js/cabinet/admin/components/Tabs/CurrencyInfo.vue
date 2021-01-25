<template>
    <v-container class="pa-0">
        <v-row>
            <v-col class="pt-0 pr-5">
                <v-text-field
                    v-model.trim="value.content[local].name"
                    label="Название валюты"
                    color="green"
                    outlined
                    :error-messages="requiredErrors('name')"
                ></v-text-field>
            </v-col>
            <v-col class="pt-0 pl-5">
                <v-text-field
                    v-model.trim="value.content[local].abbrev"
                    label="Сокращенное название"
                    color="green"
                    outlined
                    :error-messages="requiredErrors('abbrev')"
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
                    content: {},
                },
                isStatus = false;

            for (let i = 0; i < this.langs.length; i++) {
                let item = this.langs[i];

                if (this.value.status) {
                    isStatus = true;
                    value.content[item.local] = {
                        name: {
                            required
                        },
                        abbrev: {
                            required
                        }
                    }
                } else {
                    value.content[item.local] = {
                        name: {},
                        abbrev: {}
                    }
                }
            }
            value.content.ru.name = { required };

            return { value };
        },
		data: function() {
			return {
                content: this.value,
			}
		},
        watch: {
            local: function (newLocal, oldLocal) {
                for (let keyValue in this.value.content[oldLocal]) {
                    if (!this.value.content[newLocal][keyValue]) {
                        this.value.content[newLocal][keyValue] = this.value.content[oldLocal][keyValue];
                    }
                }
            }
        },
        methods:{
            validate: function () {
                this.$v.value.$touch();

                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local;

                    if (this.value.status) {
                        if (!this.$v.value.content[local].name.required) {
                            this.$emit('update:tabSelect', 1);
                            this.$emit('update:select', this.langs[i].id);
                            return false;
                        }
                    } else if (!this.$v.value.content.ru.name.required) {
                        this.$emit('update:tabSelect', 1);
                        return false;
                    }
                }
                return true;
            },
            handleInput (e) {
                this.$emit('input', this.content)
            },
            requiredErrors: function (key) {
                const errors = [];

                if (!this.$v.value.content[this.local][key].$dirty) return errors
                if (this.$v.value.content[this.local][key].required !== undefined) {
                    !this.$v.value.content[this.local][key].required && errors.push('Это поле обязательно!')
                }
                return errors
            },
        }
	}
</script>
