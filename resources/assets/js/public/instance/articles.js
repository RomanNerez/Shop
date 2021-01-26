import CatalogMixin from './catalog.js';
import SearchArticle from '../components/Article/SearchArticle';

export default {
    mixins: [CatalogMixin],
    components: {SearchArticle},
    data: function () {
        return {
            path_key: 'rubric',
            search_data: this.$store.state.data.search
        }
    }
}
