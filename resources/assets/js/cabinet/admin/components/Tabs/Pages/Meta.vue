<template>
	<div class="b-steps three">
        <div class="b-colum">
            <v-text-field
                v-model.trim="value.content[local].metaTitle"
                v-on:input="addContent('metaTitle')"
                label="Meta Title"
                color="green"
                outlined
                :error-messages="requiredErrors('metaTitle')"
            ></v-text-field>

            <v-textarea
                v-model.trim="value.content[local].metaDesc"
                v-on:input="addContent('metaDesc')"
                label="Meta Description"
                height="272px"
                no-resize
                color="green"
                outlined
                :error-messages="requiredErrors('metaDesc')"
            ></v-textarea>
        </div>
    </div>
</template>

<script>
    import { required, maxLength } from 'vuelidate/lib/validators';

	export default{
        props:['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect'],
        validations: function () {
            let value = {
                    content: {}
                };

            for(let i = 0; i < this.langs.length; i++){
                let local = this.langs[i].local;

                value.content[local] = {
                    metaTitle: {
                        required
                    },
                    metaDesc: {
                        required
                    }
                }
            }
            return { value };
        },
		data: function() {
			return {
                input:{
                    metaTitle: true,
                    metaDesc: true
                },
                content: {},
			}
		},
        mounted: function () {
            for (var i = 0; i < this.langs.length; i++) {
                let local = this.langs[i].local;
                this.content[local] = {
                    metaTitle: 0,
                    metaDesc: 0
                };
            }
        },
        watch: {
            local: function (newLocal, oldLocal) {
                for (let keyValue in this.value.content[oldLocal]) {
                    if (keyValue in this.input){
                        if (!this.content[newLocal][keyValue] && !this.value.content[newLocal][keyValue]){
                            this.value.content[newLocal][keyValue] = this.value.content[oldLocal][keyValue];
                        }
                    }
                }
            }
        },
        methods:{
            addContent: function (key) {
                this.content[this.local][key] = 1
            },
            validate: function () {
                this.$v.value.$touch();

                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local;

                    if ( !this.$v.value.content[local].metaTitle.required
                        || !this.$v.value.content[local].metaDesc.required
                    ) {
                        this.$emit('update:tabSelect', 2);
                        this.$emit('update:select', this.langs[i].id);
                        return false;
                    }
                }
                return true;
            },
            requiredErrors: function (key) {
                const errors = []
                if (!this.$v.value.content[this.local][key].$dirty) return errors
                if (this.$v.value.content[this.local][key].required !== undefined) {
                    !this.$v.value.content[this.local][key].required && errors.push('Это поле обязательно!')
                }
                return errors
            },
        }
	}
</script>
