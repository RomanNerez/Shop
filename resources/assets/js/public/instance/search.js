import Top from '../components/Search/Top.vue'
import Pagination from '../../common/components/pagination-item'

export default {
    data: function() {
        let state = this.$store.state.data.items;
        return {
            sortable: null,
            locale: this.$store.state.header.lang.selected.local,
            pager: {
                current: state.current_page,
                size: state.per_page,
                total: state.total
            }
        }
    },
    components: {
        'top-layout': Top,
        Pagination
    },
    watch: {
        sortable: function () {
            this.updateData();
        },
        'pager.current': function() {
            this.updateData();
        },
    },
    computed: {
        counter: function () {
            return this.pager.total;
        },
        items: function () {
            let items = this.$store.state.data.items;

            this.pager.current = items.current_page;
            this.pager.size = items.per_page;
            this.pager.total = items.total;

            return items.data ? items.data : [];
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
            let path = this.path;

            if (this.pager.current > 1) {
                path += '&page='+ this.pager.current;
            }
            this.$root.loading = true;

            axios.get( this._locale(path) )
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
