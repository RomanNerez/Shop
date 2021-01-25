<template>
    <v-autocomplete
        v-model="values"
        :items="items"
        filled
        chips
        color="success"
        :label="placeholder"
        item-text="content.ru.title"
        item-value="id"
        :search-input.sync="search"
        multiple
        no-data-text="Нет совпадений..."
        class="chose-product-search"
        :hide-details="!!hide"
    >
        <template v-slot:selection="data">
            <v-chip
                v-bind="data.attrs"
                :input-value="data.selected"
                close
                @click="data.select"
                @click:close="remove(data.item)"
            >
                <v-avatar left>
                    <v-img :src="data.item.images.base[0].source"></v-img>
                </v-avatar>
                {{ data.item.content.ru.title }}
            </v-chip>
        </template>
        <template v-slot:item="data">
            <v-list-item-avatar>
                <img :src="data.item.images.base[0].source">
            </v-list-item-avatar>
            <v-list-item-content>
                <v-list-item-title v-html="data.item.content.ru.title"></v-list-item-title>
                <v-list-item-subtitle v-html="data.item.content.ru.title"></v-list-item-subtitle>
            </v-list-item-content>
        </template>
    </v-autocomplete>
</template>

<script>
    export default {
        name: "ChoseProduct",
        props: ['chose', 'hide', 'placeholder'],
        data () {
            return {
                query: '',
                items: [],
                values: this.chose,
            }
        },
        mounted() {
            if (this.values.length) {
                axios.post(window.origin +'/home/products/related', {
                    data: this.values
                })
                .then(response => {
                    this.items = response.data;
                })
            }
        },
        watch: {
            values: function () {
                this.$emit('update:chose', this.values);
            }
        },
        computed: {
            search: {
                get () {
                    return this.query
                },
                set (searchInput) {
                    if (this.query !== searchInput) {
                        this.query = searchInput;

                        if (this.query && this.query.length >= 3) {
                            axios.get( window.origin +'/home/products/search?query='+ this.query )
                            .then(response => {
                                let selected = this.items.filter(item => {
                                    return this.values.indexOf(item.id) !== -1;
                                });
                                this.items = [...selected, ...response.data];
                            })
                        }
                    }
                }
            }
        },
        methods: {
            remove (item) {
                const index = this.values.indexOf(item.id)
                if (index >= 0) this.values.splice(index, 1)
            }
        },
    }
</script>
