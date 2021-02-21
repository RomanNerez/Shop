const state = () => ({
    arbitrary_links: window.data.store.arbitrary_links
})

// getters
const getters = {
    arbitraryLinks(state, getters, rootState){
        return rootState.data.store.arbitrary_links;
    }
}

const mutations = {

}
// actions
const actions = {
    async addArbitraryLink({ }, payload){
        return await axios.post(
            '/home/arbitrary-links/create',
            payload
        );
    },
    async editArbitraryLink({ }, payload){
        return await axios.post(
            '/home/arbitrary-links/edit',
            payload
        );
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
