const state = () => ({
    area_visibilities: window.data.settings.menu.area_visibility
})

// getters
const getters = {
    areaVisibilities(state, getters, rootState){
        return state.area_visibilities;
    }
}

const mutations = {
    addAreaVisibility(state, payload){
        state.area_visibilities.unshift(payload);
    },
    deleteAreaVisibility(state, payload){
        state.area_visibilities.forEach((item, index)=>{
            if (item.id == payload) {
                state.area_visibilities.splice(index, 1);
            }
        });
    },
    editAreaVisibility(state, payload){
        state.area_visibilities.forEach((item, index)=>{
            if (item.id == payload.id) {
                state.area_visibilities.splice(index, 1, payload);
            }
        });
    },
}
// actions
const actions = {
    async addAreaVisibility({ }, payload){
        return await axios.post(
            '/home/menu-area-visibility/add',
            payload
        );
    },
    async deleteAreaVisibility({ }, payload){
        return await axios.post(
            '/home/menu-area-visibility/delete',
            payload
        );
    },
    async editAreaVisibility({ }, payload){
        return await axios.post(
            '/home/menu-area-visibility/edit',
            payload
        );
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}