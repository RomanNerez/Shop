import Top from '../components/Search/Top.vue'

export default {
    data: function() {
        return {
            sortable: null,
            locale: this.$store.state.header.lang.selected.local
        }
    },
    components: {
        'top-layout': Top
    },
    watch: {
        sortable: function () {
            this.updateData();
        }
    },
    computed: {
        counter: function () {
            return this.items.length;
        },
        items: function () {
            return this.$store.state.data.items;
        },
        query: function () {
            return encodeURI(this.$store.state.data.query);
        },
        path: function () {
            return 'search?is-async=1&query='+ this.query + '&order='+ this.sortable;
        }
    },
    methods: {
        updateData: function () {
            this.$root.loading = true;

            axios.get( this._locale(this.path) )
            .then(response => {
                this.$store.commit('updateSearchItems', response.data);
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
                this.$root.loading = false;
            })
        }
    }
};
