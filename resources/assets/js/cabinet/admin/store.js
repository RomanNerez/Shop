
export default {
    state: {
        data: window.data,
        token: window._token
    },
    getters: {
        userData: function(state) {
            return state.data.user;
        },
        storeData: function (state) {
            let data = state.data.store,
                root_catalog = data.categories.filter(item => {
                    return item.is_root;
                });

            return {
                data: data,
                root_catalog: root_catalog.length ? root_catalog[0] : null,
                available: {
                    categories: data.categories.filter(item => {
                        return item.status;
                    })
                }
            };
        },
        servicesData: function (state) {
            let data = state.data.services;

            return {
                data: data,
                available: {
                    categories: data.categories.filter(item => {
                        return item.status;
                    })
                }
            };
        },
        contentData: function (state) {
            let data = state.data.content;

            return {
                data: data,
                available: {
                    categories: data.categories.filter(item => {
                        return item.status;
                    })
                }
            };
        },
        currencyData: function (state) {
            return state.data.settings.currency;
        }
    },
    mutations: {
        addCategories(state, data) {
            if (data.is_root) {
                for (let i = 0; i < state.data[data.related].categories.length; i++) {
                    if ( state.data[data.related].categories[i].is_root ) {
                        state.data[data.related].categories[i].is_root = false;
                    }
                }
            }
            state.data[data.related].categories.unshift(data);
        },
        editCategories(state, data) {
            if (data.input.is_root) {
                for (let i = 0; i < state.data[data.input.related].categories.length; i++) {
                    if ( state.data[data.input.related].categories[i].is_root ) {
                        state.data[data.input.related].categories[i].is_root = false;
                    }
                }
            }
            state.data[data.input.related].categories.splice(data.index, 1, data.input);
        },
        rmCategories(state, input) {
            state.data[input.related].categories.splice(input.index, 1);
        },

        addGroups(state, data) {
            state.data[data.related].groups.unshift(data);
        },
        editGroups(state, data) {
            let groups = state.data[data.related].groups;

            for (let i = 0; i < groups.length; i++) {
                if ( groups[i].id === data.id ) {
                    state.data[data.related].groups.splice(i, 1, data);
                    break;
                }
            }
        },
        updateGroups(state, input) {
            input.data.forEach(item => {
                state.data[input.related].groups.forEach((group, index) => {
                    if ( group.id === item.id ) {
                        state.data[input.related].groups.splice(index, 1);
                    }
                })
            });
            state.data[input.related].groups.unshift(...input.data);
        },
        rmGroups(state, input) {
            let groups = state.data[input.related].groups;

            for (let i = 0; i < groups.length; i++) {
                if ( groups[i].id === input.id ) {
                    state.data[input.related].groups.splice(i, 1);
                    break;
                }
            }
        },

        addSubs(state, data) {
            let groups = state.data[data.related].groups;

            for (let i = 0; i < groups.length; i++) {
                if ( groups[i].id === data.parent ) {
                    state.data[data.related].groups[i].subs.unshift(data.item);
                    break;
                }
            }
        },
        editSubs(state, data) {
            let groups = state.data[data.related].groups;

            for (let g_i = 0; g_i < groups.length; g_i++) {
                let group = groups[g_i];

                for (let s_i = 0; s_i < group.subs.length; s_i++) {
                    if ( group.subs[s_i].id === data.id ) {
                        state.data[data.related].groups[g_i].subs.splice(s_i, 1, data);
                        break;
                    }
                }
            }
        },
        rmSubs(state, data) {
            let groups = state.data[data.related].groups;

            for (let g_i = 0; g_i < groups.length; g_i++) {
                let group = groups[g_i];

                for (let s_i = 0; s_i < group.subs.length; s_i++) {
                    if ( group.subs[s_i].id === data.id ) {
                        state.data[data.related].groups[g_i].subs.splice(s_i, 1);
                        break;
                    }
                }
            }
        },

        addCollections(state, data) {
            state.data.store.collections.unshift(data);
        },
        editCollections(state, data) {
            let collections = state.data.store.collections;

            for (let i = 0; i < collections.length; i++) {
                if ( collections[i].id === data.id ) {
                    state.data.store.collections.splice(i, 1, data);
                    break;
                }
            }
        },
        rmCollections(state, id) {
            let collections = state.data.store.collections;

            for (let i = 0; i < collections.length; i++) {
                if ( collections[i].id === id ) {
                    state.data.store.collections.splice(i, 1);
                    break;
                }
            }
        },

        addAttribute(state, data) {
            state.data[data.related].attributes.unshift(data);
        },
        editAttribute(state, data) {
            let attributes = state.data[data.related].attributes;

            for (let i = 0; i < attributes.length; i++) {
                if ( attributes[i].id === data.id ) {
                    state.data[data.related].attributes.splice(i, 1, data);
                    break;
                }
            }
        },
        updateAttribute(state, input) {
            input.data.forEach(item => {
                state.data[input.related].attributes.forEach((group, index) => {
                    if ( group.id === item.id ) {
                        state.data[input.related].attributes.splice(index, 1);
                    }
                })
            });
            state.data[input.related].attributes.unshift(...input.data);
        },
        rmAttribute(state, input) {
            let attributes = state.data[input.related].attributes;

            for (let i = 0; i < attributes.length; i++) {
                if ( attributes[i].id === input.id ) {
                    state.data[input.related].attributes.splice(i, 1);
                    break;
                }
            }
        },

        addAttrList(state, data) {
            let attributes = state.data[data.related].attributes;

            for (let i = 0; i < attributes.length; i++) {
                if ( attributes[i].id === data.parent ) {
                    state.data[data.related].attributes[i].subs.unshift(data.item);
                    break;
                }
            }
        },
        editAttrList(state, data) {
            let attributes = state.data[data.related].attributes;

            for (let g_i = 0; g_i < attributes.length; g_i++) {
                let attribute = attributes[g_i];

                for (let s_i = 0; s_i < attribute.subs.length; s_i++) {
                    if ( attribute.subs[s_i].id === data.id ) {
                        state.data[data.related].attributes[g_i].subs.splice(s_i, 1, data);
                        break;
                    }
                }
            }
        },
        rmAttrList(state, data) {
            let attributes = state.data[data.related].attributes;

            for (let g_i = 0; g_i < attributes.length; g_i++) {
                let attribute = attributes[g_i];

                for (let s_i = 0; s_i < attribute.subs.length; s_i++) {
                    if ( attribute.subs[s_i].id === data.id ) {
                        state.data[data.related].attributes[g_i].subs.splice(s_i, 1);
                        break;
                    }
                }
            }
        },

        addCurrencyList(state, data) {
            state.data.settings.currency.list.push(data.list);

            if (data.values.length) {
                state.data.settings.currency.values.push(...data.values);
            }
        },
        editCurrencyList(state, data) {
            let currencies = state.data.settings.currency.list;

            for (let i = 0; i < currencies.length; i++) {
                if ( currencies[i].id === data.id ) {
                    state.data.settings.currency.list.splice(i, 1, data);
                    break;
                }
            }
        },
        rmCurrencyList(state, id) {
            let list = state.data.settings.currency.list,
                values = state.data.settings.currency.values;

            for (let i = 0; i < values.length; i++) {
                let value = values[i];

                if (value.first === id || value.last === id) {
                    values.splice(i, 1);
                    i = 0;
                }
            }

            state.data.settings.currency.values = values;

            for (let i = 0; i < list.length; i++) {
                if ( list[i].id === id ) {
                    state.data.settings.currency.list.splice(i, 1);
                    break;
                }
            }
        },

        reloadProducts(state, input) {
            state.data[input.related_to].products = input.data;
        },
        addProducts(state, data) {
            console.log(data.related_to, state.data);
            state.data[data.related_to].products.unshift(data);
        },
        editProducts(state, data) {
            let products = state.data[data.related_to].products;

            for (let i = 0; i < products.length; i++) {
                if ( products[i].id === data.id ) {
                    state.data[data.related_to].products.splice(i, 1, data);
                    break;
                }
            }
        },
        rmProducts(state, input) {
            let products = state.data[input.related_to].products;

            for (let i = 0; i < products.length; i++) {
                if ( products[i].id === input.id ) {
                    state.data[input.related_to].products.splice(i, 1);
                    break;
                }
            }
        },

        addArticle(state, data) {
            state.data.content.articles.unshift(data);
        },
        editArticle(state, data) {
            let article = state.data.content.articles;

            for (let i = 0; i < article.length; i++) {
                if ( article[i].id === data.id ) {
                    state.data.content.articles.splice(i, 1, data);
                    break;
                }
            }
        },
        rmArticle(state, id) {
            let article = state.data.content.articles;

            for (let i = 0; i < article.length; i++) {
                if ( article[i].id === id ) {
                    state.data.content.articles.splice(i, 1);
                    break;
                }
            }
        },
        editPage(state, data) {
            state.data.content.pages.splice(data.index, 1, data.input);
        }
    }
}
