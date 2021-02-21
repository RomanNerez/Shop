const state = () => ({
    area_visibilities: window.data.settings.menu.area_visibilities,
    selectedAreaVisibility: null
})

// getters
const getters = {
    areaVisibilities(state, getters, rootState){
        return rootState.data.settings.menu.area_visibilities;
    }
}

const mutations = {
    updatedSelectedAreaVisibility(state, payload){
        state.selectedAreaVisibility = payload;
    },
    addAreaVisibility(state, payload){
        state.area_visibilities.unshift(payload);
        if (!state.selectedAreaVisibility) {
            state.selectedAreaVisibility = payload.id
        }
    },
    deleteAreaVisibility(state, payload){
        state.area_visibilities.forEach((item, index)=>{
            if (item.id == payload) {
                state.area_visibilities.splice(index, 1);
            }
        });
        if (state.selectedAreaVisibility == payload && state.area_visibilities.length) {
            state.selectedAreaVisibility = state.area_visibilities[0].id
        }
        if (!state.area_visibilities.length) {
            state.selectedAreaVisibility = null
        }
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
