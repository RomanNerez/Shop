<template>
    <v-card
        class="mt-0 mb-0 elevation-1"
    >
        <v-card-title class="text-caption justify-space-between py-3">
            Добавьте элементы меню из столбца слева.
            <v-btn small color="success"
                :disabled="!changes"
                v-on:click="updateMenu"
                :loading="btnLoading"
            >
                Сохранить
            </v-btn>
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text
            min-heigth="100px"
        >
            <div
                style="min-height: 200px; width: 100%"
                class="border-line-red d-flex align-center justify-center background-red"
                v-if="emptyListMenu"
            >
                <div>
                    <div class="d-flex justify-center">
                        <v-icon large color="blue lighten-3">mdi-alert-circle-outline</v-icon>
                    </div>
                    <div class="text-subtitle-1">
                        В этой области нет ниодного меню
                    </div>
                </div>
            </div>
            <nested-draggable
                class="pl-0"
                v-model="getMenuList"
                :options="{
                    selectedAreaVisibility,
                    depth,
                    level: 1
                }"
            />
        </v-card-text>
    </v-card>
</template>

<script>
    import { mapState } from 'vuex';
    import NestedDraggable from "./NestedDraggable";

    export default{
        components:{
            NestedDraggable
        },
        data: function (){
            return {
                getMenuList: [],
                btnLoading: false,
                depth: 3
            }
        },
        watch:{
            menuList: {
                deep: true,
                handler(a,b){
                    this.updateMenuList();
                    this.$store.commit('Menu/updateChanges', true);
                }
            }
        },
        mounted() {
            this.updateMenuList();
        },
        computed: {
            ...mapState('MenuAreaVisibilities',[
                'selectedAreaVisibility'
            ]),
            ...mapState('Menu',[
                'menuList',
                'changes'
            ]),
            emptyListMenu(){
                return !this.getMenuList.filter((item)=>{
                    return item.area_visibility_id == this.selectedAreaVisibility
                    && item.deleted !== true;
                }).length
            }
        },
        methods:{
            updateMenuList(){
                let data = [];
                this.menuList.forEach((item)=>{
                    data.push(Object.assign({children: []}, item));
                });
                this.getMenuList = this.stringifyObject(data);
            },
            stringifyObject(array){
                var aggregate = this.getParent(array);
                for (var i = 0; i < array.length; i++) {
                    var data = Object.assign({}, array[i]);
                    if (data.parent_id) {
                        this.searchAndPush(aggregate, data);
                    }
                }
                return aggregate;
            },
            getParent(array){
                var aggregate = [];
                for (var i = 0; i < array.length; i++) {
                    var item = Object.assign({}, array[i]);
                    if (item.parent_id === null && item.deleted != true) {
                        aggregate.push(item);
                    }
                }
                return aggregate;
            },
            searchAndPush(array, nextArray){
                for (var j = 0; j < array.length; j++) {
                    if (array[j].id == nextArray.parent_id) {
                        array[j].children.push(nextArray);
                        return;
                    }
                    if (array[j].children.length) {
                        this.searchAndPush(array[j].children, nextArray);
                    }
                }
            },
            updateMenu(){
                this.btnLoading = true;
                this.$store.dispatch('Menu/updateMenu')
                .then(response=>{
                    this.changes = false
                })
                .catch(error=>{

                })
                .finally(()=>{
                    this.btnLoading = false;
                })
            }
        }
    }
</script>

<style scoped>
    .group-item{
        list-style: none;
    }
    .v-expansion-panels{
        border-radius: 0px;
    }
    .v-expansion-panel::before{
        box-shadow: none !important;
    }
    .border {
        border: 1px dashed orange;
    }
    .background-green{
        background-color: #E8F5E9;
    }
    .background-red{
        background-color: #FFEBEE;
    }
    .border-line-red{
        border: 1px dashed #EF5350 !important;
    }
    .border-line{
        border: 1px dashed #1B5E20 !important;
        margin: 0 0 5px 0;
    }
    .border-line-top{
        border-top: 1px dashed #1B5E20 !important;
    }
</style>
