<template>
	<div class="b-steps two">
        <div class="b-inputs-three"
            v-for="(v, index) in $v.value.content[local].filter.$each.$iter"
        >
            <div class="b-inputs-three__wrapper"
                :disabled="!v.disabled.$model"
            >
                <v-text-field
                    v-model.trim="v.title.$model"
                    v-on:input="data.content[local].filter[index].title = 1"
                    class="b-input"
                    label="Название"
                    color="green"
                    outlined
                    :error-messages="filterErrors(index, 'title')"
                ></v-text-field>

                <v-select
                    v-model.trim="v.type.$model"
                    v-on:input="data.content[local].filter[index].type = 1"
                    :items="filterTypes"
                    class="b-select"
                    item-value="id"
                    color="green"
                    item-text="caption"
                    label="Тип"
                    outlined
                    :error-messages="filterErrors(index, 'type')"
                ></v-select>

                <v-text-field
                    :disabled="v.type.$model && v.type.$model === 1"
                    v-on:input="data.content[local].filter[index].unit = 1"
                    v-model.trim="v.unit.$model"
                    class="b-input"
                    label="Единица измерения"
                    color="green"
                    outlined
                    :error-messages="filterErrorsUnit(index)"
                ></v-text-field>
            </div>

            <div class="b-inputs-btn">
                <v-btn class="b-close b-eye"  large color="green" icon
                    v-on:click="disabledFilter(index)"
                >
                    <svg x="0px" y="0px" fill="currentColor" viewBox="0 0 511.992 511.992" >
                        <path d="M510.096,249.937c-4.032-5.867-100.928-143.275-254.101-143.275C124.56,106.662,7.44,243.281,2.512,249.105c-3.349,3.968-3.349,9.792,0,13.781C7.44,268.71,124.56,405.329,255.995,405.329S504.549,268.71,509.477,262.886C512.571,259.217,512.848,253.905,510.096,249.937z M255.995,383.996c-105.365,0-205.547-100.48-230.997-128c25.408-27.541,125.483-128,230.997-128c123.285,0,210.304,100.331,231.552,127.424C463.013,282.065,362.256,383.996,255.995,383.996z"/>
                        <path d="M255.995,170.662c-47.061,0-85.333,38.272-85.333,85.333s38.272,85.333,85.333,85.333s85.333-38.272,85.333-85.333S303.056,170.662,255.995,170.662z M255.995,319.996c-35.285,0-64-28.715-64-64s28.715-64,64-64s64,28.715,64,64S291.28,319.996,255.995,319.996z"/>
                    </svg>
                </v-btn>

                <v-btn class="b-close"  large color="red" icon
                    v-on:click="deleteFilter(index)"
                >
                    <svg height="427pt" fill="currentColor" viewBox="-40 0 427 427.00131" width="427pt">
                        <path d="m232.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m114.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m28.398438 127.121094v246.378906c0 14.5625 5.339843 28.238281 14.667968 38.050781 9.285156 9.839844 22.207032 15.425781 35.730469 15.449219h189.203125c13.527344-.023438 26.449219-5.609375 35.730469-15.449219 9.328125-9.8125 14.667969-23.488281 14.667969-38.050781v-246.378906c18.542968-4.921875 30.558593-22.835938 28.078124-41.863282-2.484374-19.023437-18.691406-33.253906-37.878906-33.257812h-51.199218v-12.5c.058593-10.511719-4.097657-20.605469-11.539063-28.03125-7.441406-7.421875-17.550781-11.5546875-28.0625-11.46875h-88.796875c-10.511719-.0859375-20.621094 4.046875-28.0625 11.46875-7.441406 7.425781-11.597656 17.519531-11.539062 28.03125v12.5h-51.199219c-19.1875.003906-35.394531 14.234375-37.878907 33.257812-2.480468 19.027344 9.535157 36.941407 28.078126 41.863282zm239.601562 279.878906h-189.203125c-17.097656 0-30.398437-14.6875-30.398437-33.5v-245.5h250v245.5c0 18.8125-13.300782 33.5-30.398438 33.5zm-158.601562-367.5c-.066407-5.207031 1.980468-10.21875 5.675781-13.894531 3.691406-3.675781 8.714843-5.695313 13.925781-5.605469h88.796875c5.210937-.089844 10.234375 1.929688 13.925781 5.605469 3.695313 3.671875 5.742188 8.6875 5.675782 13.894531v12.5h-128zm-71.199219 32.5h270.398437c9.941406 0 18 8.058594 18 18s-8.058594 18-18 18h-270.398437c-9.941407 0-18-8.058594-18-18s8.058593-18 18-18zm0 0"/><path d="m173.398438 154.703125c-5.523438 0-10 4.476563-10 10v189c0 5.519531 4.476562 10 10 10 5.523437 0 10-4.480469 10-10v-189c0-5.523437-4.476563-10-10-10zm0 0"/>
                    </svg>
                </v-btn>
            </div>
        </div>
        <v-btn block color="primary"
            v-on:click="addFilter"
        >Добавить фильтр</v-btn>
        <template>
            <div class="text-center ma-2">
                <v-snackbar
                    v-model="snackbar.show"
                >
                    {{snackbar.text}}
                    <template v-slot:action="{ attrs }">
                        <v-btn
                            color="pink"
                            text
                            v-bind="attrs"
                            @click="snackbar.show = false"
                        >
                            Закрыть
                        </v-btn>
                    </template>
                </v-snackbar>
            </div>
        </template>
    </div>
</template>

<script>
    import { validationMixin } from 'vuelidate';
    import { required, maxLength } from 'vuelidate/lib/validators';
	export default{
        props:['value', 'local', 'status', 'langs', 'valid', 'selected'],
        validations: function () {
            let value = {
                    content: {}
                },
                isStatus = false;

            for(let i = 0; i < this.langs.length; i++){
                let lang = this.langs[i].local;
                if(this.status){
                    isStatus = true;

                    value.content[lang] = {
                        filter:{
                            required,
                            $each:{
                                title:{
                                    required
                                },
                                type: {
                                    required
                                },
                                unit: {
                                    required
                                },
                                disabled:{}
                            }
                        },
                    }
                } else {
                    value.content[lang] = {
                        filter:{
                            $each:{
                                title:{},
                                type: {},
                                unit:{},
                                disabled:{}
                            }
                        },
                    }
                }
            }
            return { value };
        },
		data: function() {
			return {
                snackbar:{
                    show: false,
                    text: ''
                },
				data: {
                    content: {}
                },
                filterTypes:[
                    {
                        caption: 'строка',
                        id: 1
                    },{
                        caption: 'число',
                        id: 2
                    },{
                        caption: 'промежуток',
                        id: 3
                    }
                ],
			}
		},
        watch: {
            local: function (newLocal, oldLocal) {
                if (!this.data.content[newLocal]) {
                    return;
                }
                var newLocalFiltersContent = this.data.content[newLocal].filter,
                    oldLocalFilters = this.value.content[oldLocal].filter,
                    newLocalFilters = this.value.content[newLocal].filter;

                for (var i = 0; i < oldLocalFilters.length; i++) {
                    let filter = oldLocalFilters[i];

                    for (var keyFilter in filter) {

                        var newFilter = this.value.content[newLocal].filter[i][keyFilter],
                            oldFilter = this.value.content[oldLocal].filter[i][keyFilter];

                        if (!newLocalFiltersdata.content[i][keyFilter]) {
                           this.value.content[newLocal].filter[i][keyFilter] =
                            this.value.content[oldLocal].filter[i][keyFilter];
                        }
                    }
                }
            }
        },
        methods:{
            notification: function (text = 'Null') {
                this.snackbar.show = true;
                this.snackbar.text = text;
            },
            validate: function () {
                this.$v.value.$touch();

                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local;

                    if (this.value.content[local].status) {
                        if (!this.value.content[local].filter.length) {
                            this.$emit('update:tabSelect', 1);
                            this.$emit('update:select', this.langs[i].id);
                            this.notification('При публикации должен быть хоть бы один фильтр');
                            return false;
                        }
                        let isDisabledAll = false;
                        for (var filter in this.$v.value.content[local].filter.$each.$iter) {
                            var filter = this.$v.value.content[local].filter.$each.$iter[filter];
                            if (filter.disabled.$model) {
                               isDisabledAll = true;

                                if (!filter.title.required && !filter.type.required) {
                                    this.$emit('update:tabSelect', 1);
                                    this.$emit('update:select', this.langs[i].id);
                                    return false;
                                }

                                if (filter.type.$model !== 1 && !filter.unit.required) {
                                    this.$emit('update:tabSelect', 1);
                                    this.$emit('update:select', this.langs[i].id);
                                    return false;
                                }
                            }

                        }

                        if (!isDisabledAll) {
                            this.$emit('update:tabSelect', 1);
                            this.$emit('update:select', this.langs[i].id);
                            this.notification('Хоть бы один фильтр должен быть разблокирован');
                            return false;
                        }


                    }
                }
                return true;
            },
            handleInput (e) {
                this.$emit('input', this.content)
            },
            filterErrors: function (index, key) {
                const errors = [],
                    item = this.$v.value.content[this.local].filter.$each.$iter[index];
                if (!item.disabled.$model) return errors;
                if (!item[key].$dirty) return errors;
                if (item[key].required !== undefined) {
                    !item[key].required && errors.push('Это поле обязательно!')
                }
                return errors
            },
            filterErrorsUnit: function (index) {
                const errors = [],
                    item = this.$v.value.content[this.local].filter.$each.$iter[index],
                    type = item.type.$model;

                if (!item.disabled.$model || type === 1 || !item.unit.$dirty) {
                    return errors;
                }
                if (item.unit.required !== undefined) {
                    !item.unit.required && errors.push('Это поле обязательно!');
                }
                return errors
            },
            disabledFilter: function (index) {
                for(let i = 0; i < this.langs.length; i++){
                    let local = this.langs[i].local,
                        disabled = this.value.content[local].filter[index].disabled;
                    this.value.content[local].filter[index].disabled = !disabled;
                }
            },
            addFilter: function(){
                for(let i = 0; i < this.langs.length; i++){
                    let local = this.langs[i].local,
                        length = this.value.content[this.local].filter.length,
                        newArray = {
                            title: '',
                            type: null,
                            unit: '',
                            disabled: true
                        };

                    this.value.content[local].filter.splice(length, 1, newArray);
                }
                this.addContent();
            },
            addContent: function () {
                for(let i = 0; i < this.langs.length; i++){
                    let local = this.langs[i].local,
                        newArray = {
                            title: 0,
                            type: 0,
                            unit: 0,
                            disabled: true
                        };

                    if (!this.data.content[local]) {
                        this.$set(this.data.content, local, {});
                    }

                    if (!this.data.content[local].filter) {
                        this.$set(this.data.content[local], 'filter', []);
                    }
                    let length = this.data.content[this.local].filter.length;
                    this.data.content[local].filter.splice(length, 1, newArray);
                }
            },
            deleteFilter: function(index){
                for(let i = 0; i < this.langs.length; i++){
                    let local = this.langs[i].local;
                    if(this.selected){
                        if (!this.value.deletedFilter) this.value.deletedFilter = [];
                        let id = this.value.content[local].filter[index].id;
                        this.value.deletedFilter.push(id);
                    }
                    this.value.content[local].filter.splice(index, 1);
                    this.data.content[local].filter.splice(index, 1);
                }
            },
        }
	}
</script>
