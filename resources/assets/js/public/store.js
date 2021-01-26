export default {
    state: {
        data: response.data,
        header: response.header
    },
    getters: {
        getCart: function (state) {
            return state.header.cart;
        },
        getFavorites: function (state) {
            return state.header.favorites;
        },
        getCompare: function (state) {
            return state.header.compare;
        }
    },
    mutations: {
        updateCatalog(state, data) {
            if ( data === null ) {
                state.data.list = [];
                return;
            }
            state.data.list = data.list;

            if ( data.filters.items.length ) {
                state.data.filters = data.filters;
            }
        },
        updateSearchItems(state, data) {
            state.data.items = data;
        },
        addReview(state, data) {
            state.data.reviews.unshift(data);
        },
        removeFilter(state, data) {
            state.data.filters.selected = data;
        },
        addCart(state, data) {
            if ( !state.header.cart ) {
                state.header.cart = [];
            }
            state.header.cart.unshift(data);
        },
        bulkAddCart(state, data) {
            if ( !state.header.cart ) {
                state.header.cart = [];
            }
            state.header.cart.unshift(...data);
        },
        removeCart(state, index) {
            state.header.cart.splice(index, 1);
            state.data.items.splice(index, 1);
        },
        countCart(state, data) {
            state.header.cart[data.index].count = data.count;
        },
        addFavorites(state, data) {
            if ( !state.header.favorites ) {
                state.header.favorites = [];
            }
            state.header.favorites.unshift(data);
        },
        removeFavorites(state, index) {
            state.header.favorites.splice(index, 1);
            state.data.items.splice(index, 1);
        },
        addCompare(state, data) {
            if ( !state.header.compare ) {
                state.header.compare = [];
            }
            state.header.compare.unshift(data);
        },
        removeCompare(state, index) {
            state.header.compare.splice(index, 1);
            state.data.items.splice(index, 1);
        }
    }
}
