import FilterBase from '../components/Catalog/FilterBase.vue'
import Pagination from '../../common/components/pagination-item'

export default {
    components: {
        FilterBase,
        Pagination
    },
    data: function() {
        let state = this.$store.state.data.list;
        return {
            pager: {
                current: state.current_page,
                size: state.per_page,
                total: state.total
            }
        }
    },
    watch: {
        'filters.path': function () {
            this.updateData();
        },
        'pager.current': function() {
            this.updateData();
        },
        search_data: function () {
            this.updateData();
        }
    },
    computed: {
        items: function () {
            let data = this.$store.state.data;

            this.pager.current = data.list.current_page;
            this.pager.size = data.list.per_page;
            this.pager.total = data.list.total;

            return {
                list: data.list.data ? data.list.data : [],
                filters: data.filters
            };
        },
        filters: function () {
            let data = {},
                path = [],
                selected = [];

            this.items.filters.items.forEach(subs => {
                subs.items.forEach(sub => {
                    if ( this.items.filters.selected.indexOf(sub.item.id) !== -1 ) {
                        if (!data[subs.group.slug]) {
                            data[subs.group.slug] = [];
                        }
                        selected.push({
                            id: sub.item.id,
                            name: sub.item.content.title
                        });
                        data[subs.group.slug].push(sub.item.slug);
                    }
                });
            });

            for (let key in data) {
                path.push(key +'_'+ data[key].join('_'));
            }

            path = path.length ? '/'+ this.path_key +'/'+ path.join('/') : '';

            return {
                selected,
                path
            }
        }
    },
    methods: {
        updateData: function () {
            let href = this._locale(window.location.pathname),
                path = href.split('/'+ this.path_key)[0] + this.filters.path,
                get = '?is-async=true';

            if (this.sortable) {
                get += '&order='+ this.sortable;
            }
            if (this.search_data) {
                get += '&search='+ this.search_data;
            }
            if (this.pager.current > 1) {
                get += '&page='+ this.pager.current;
            }

            window.history.replaceState(null, null, path);
            this.$root.loading = true;

            axios.get(path + get)
            .then(response => {
                const data = response.data;

                data.filters.items = data.filters.items.filter(item => {
                    return item.enabled;
                }).map(item => {
                    let find = this.items.filters.items.find(el => el.group.id === item.group.id);

                    item.show = find ? find.show : item.show;
                    return item;
                });

                this.$store.commit('updateCatalog', data);
            })
            .catch(error => {
                if (error.response && error.response.status === 404) {
                    this.$store.commit('updateCatalog', null);
                }
            })
            .finally(() => {
                this.$root.loading = false;
            })
        }
    }
}
