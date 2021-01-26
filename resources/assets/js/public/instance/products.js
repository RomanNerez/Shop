import CatalogMixin from './catalog.js';
import FilterTop from '../components/Catalog/FilterTop.vue';

export default {
    mixins: [CatalogMixin],
    data: function () {
        return {
            sortable: null,
            path_key: 'group'
        }
    },
    watch: {
        sortable: function () {
            this.updateData();
        }
    },
    components: {
        'filter-top': FilterTop
    },
    computed: {
        counter: function () {
            return {
                list: this.items.list.length
            }
        }
    }
}
