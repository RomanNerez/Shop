<template>
	<div class="b-steps b-one">
        <div class="b-colum">
            <p>Тип поля</p>
            <v-radio-group class="my-0"
                v-model="value.type"
                mandatory
            >
                <v-radio v-for="item in types"
                         :label="item.name"
                         :value="item.val"
                         :key="item.val"
                         color="info"
                ></v-radio>
            </v-radio-group>
        </div>

        <div class="b-colum">
            <p>Зависимости для товаров</p>

            <v-row>
                <v-col class="py-0">
                    <v-checkbox
                        v-model="value.price"
                        label="стоимость"
                        color="info"
                        hide-details
                    ></v-checkbox>

                    <v-checkbox
                        v-model="value.count"
                        label="количество"
                        color="info"
                        hide-details
                    ></v-checkbox>

                    <v-checkbox
                        v-model="value.data"
                        label="контент"
                        color="info"
                        hide-details
                    ></v-checkbox>
                </v-col>
            </v-row>
        </div>
        <v-snackbar
            v-model="alert.show"
            absolute top center
            elevation="24"
            color="orange darken-1"
        >
            {{ alert.text }}

            <template v-slot:action="{ attrs }">
                <v-btn text
                       color="white"
                       v-bind="attrs"
                       @click="alert.show = false"
                >
                    Закрыть
                </v-btn>
            </template>
        </v-snackbar>
    </div>
</template>

<script>
	export default{
        props:['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect'],
        validations: function () {
            let value = {
                    file: {},
                    content: {},
                    slug: {
                        required,
                        regexp:function (val) {
                            return !!val.match(/[^0-9a-z\-]+/gi);
                        }
                    }
                },
                isStatus = false;

            for (let i = 0; i < this.langs.length; i++) {
                let item = this.langs[i];

                if (this.value.status) {
                    isStatus = true;
                    value.content[item.local] = {
                        title: {
                            required
                        },
                        desc: {
                            required
                        }
                    }
                } else {
                    value.content[item.local] = {
                        title: {},
                        desc: {},
                    }
                }
            }
            value.content.ru.title = { required };

            if (isStatus) {
                value.file.required = required;
            }

            return { value };
        },
		data: function() {
			return {
			    types: [
                    {
                        name: 'единичный выбор',
                        val: 'radio'
                    },{
                        name: 'выпадающий список',
                        val: 'select'
                    }/*,{
                        name: 'множественный выбор',
                        val: 'checkbox'
                    },{
                        name: 'поле ввода',
                        val: 'input'
                    }*/
                ],
                content: this.value,
                alert: {
                    show: false,
                    text: null
                }
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
                if ( this.value.status ) {
                    if (!Boolean(this.value.type)) {
                        this.alert.show = true;
                        this.alert.text = 'Укажите значение "Тип поля", что бы опубликовать атрибут';
                        this.$emit('update:tabSelect', 1);

                        return false;
                    }
                }

                return true;
            }
        }
	}
</script>
