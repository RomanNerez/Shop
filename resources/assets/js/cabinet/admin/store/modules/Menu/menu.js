const state = () => ({
    menuList: window.data.settings.menu.items,
    changes: false
})

// getters
const getters = {
    getMenuList(state, getters, rootState){
        return rootState.data.settings.menu.items;
    }
}

const mutations = {
    updatedMenu(state, payload){
        state.menuList = payload;
    },
    addMenu(state, payload){
        state.menuList.push(payload);
    },
    deleteMenuByAreaVisibility(state, payload){
        state.menuList = state.menuList.filter((item)=>{
            return item.area_visibility_id != payload
        });
    },
    updateParentId(state, payload){
        state.menuList.forEach((item)=>{
            if (item.id === payload.id) {
                item.parent_id = payload.parent_id;
            }
        });
    },
    updateArbitraryMenu(state, payload){
        state.menuList.forEach((item)=>{
            if (item.instance_id === payload.id) {
                item.instance.content = payload.content;
                item.instance.link = payload.link;
            }
        });
    },
    deleteMenu(state, payload){
        state.menuList.forEach((item, i)=>{
            if (item.id === payload.id) {
                state.menuList.splice(i, 1, payload);
            }
            if (item.parent_id === payload.id) {
                item.parent_id = payload.parent_id;
            }
        });
    },
    setOrder(state, payload){
        let data = [];
        state.menuList.forEach((item)=>{
            if (item.parent_id == payload.parent_id) {
                data.push(item);
            }
        });
        data.sort((a,b)=>{
           return a.order - b.order
        });
        data.forEach((item, i)=>{
            item.order = i+1;
        });
        console.log(data);
    },
    updateChanges(state, payload){
        state.changes = payload;
    }
}
// actions
const actions = {
    async createMenu({ }, payload){
        return await axios.post(
            '/home/menu/create',
            payload
        );
    },
    async deleteMenu({ }, payload){
        return await axios.post(
            '/home/menu/create',
            payload
        );
    },
    async updateMenu({ state }, payload){
        return await axios.post(
            '/home/menu/update',
            state.menuList
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
