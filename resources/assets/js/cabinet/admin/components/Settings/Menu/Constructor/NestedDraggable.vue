<template>
    <draggable
        :list="list"
        :value="value"
        @input="emitter"
        tag="ul"
        handle=".handle"
        group="menu"
        class="group-item"
        @end="onMove"
    >
        <li
            v-for="(element, index) in realValue"
            :data-id="element.id"
            :data-order="index + 1"
        >
            <div class="border-line background-green"
                 :class="{'py-4 px-6': element.instance_type != 'arbitrary_links'}"
            >
                <template v-if="element.instance_type != 'arbitrary_links'">
                    <div class="d-flex align-center">
                        <div>
                            <v-icon class="handle cursor-move">mdi-drag</v-icon>
                            <span>{{element.instance.content.ru.title}}</span>
                        </div>
                        <v-spacer></v-spacer>
                        <v-btn icon x-small
                               @click="deleteMenu(element)"
                        >
                            <v-icon>mdi-delete</v-icon>
                        </v-btn>
                    </div>
                </template>
                <v-expansion-panels
                    v-else
                    accordion
                >
                    <v-expansion-panel
                        :key="element.id"
                    >
                        <v-expansion-panel-header
                            class="green lighten-5 text-body-2"
                        >
                            <div>
                                <v-icon class="handle cursor-move">mdi-drag</v-icon>
                                <span>{{element.instance.content.ru.title}}</span>
                            </div>
                        </v-expansion-panel-header>
                        <v-expansion-panel-content
                            class="border-line-top"
                        >
                            <ArbitraryLinks
                                :dataEdit="element"
                                v-on:delete="deleteMenu"
                            />
                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>
            </div>
            <nested-draggable
                :data-parent-id="element.id"
                class="sub-group-item pl-5"
                :list="element.children"
                :options="options"
            />
        </li>
    </draggable>
</template>
<script>
    import ArbitraryLinks from "./ArbitraryLinks";
    import { mapState } from 'vuex';

    export default {
        name: "nested-draggable",
        components:{
            ArbitraryLinks
        },
        props: {
            value: {
                required: false,
                type: Array,
                default: null
            },
            list: {
                required: false,
                type: Array,
                default: null
            },
            options:{
                required: false,
                type: Object,
                default: null
            }
        },
        computed:{
            realValue() {
                var elements = this.value ? this.value : this.list;
                elements = elements.filter((item)=>{
                    return item.area_visibility_id == this.options.selectedAreaVisibility && item.deleted !== true
                });
                elements.sort(function(a, b) {
                    return a.order - b.order;
                });
                return elements;
            },
            ...mapState('Menu', [
                'menuList'
            ])
        },
        methods:{
            emitter(value) {
                this.$emit("input", value);
            },
            deleteMenu(element){
                this.$set(element, 'deleted', true);
                delete element.children;
                this.$store.commit(
                    'Menu/deleteMenu',
                    element
                    );
            },
            onMove(event, originalEvent){
                let parentId = Number(event.to.dataset.parentId) ? Number(event.to.dataset.parentId) : null,
                    itemId = Number(event.clone.dataset.id),
                    data = {
                        order: event.newIndex + 1
                    };
                this.$set(data, 'id', itemId);
                this.$set(data, 'parent_id', parentId);
                this.$store.commit('Menu/updateParentId', data);
                this.$store.commit('Menu/setOrder', data);
            }
        }
    };
</script>
<style scoped>
    .sub-group-item{
        list-style: none;
        min-height: 1px;
    }
    .background-green{
        background-color: #E8F5E9;
    }
    .v-expansion-panels{
        border-radius: 0px;
    }
    .v-expansion-panel::before{
        box-shadow: none !important;
    }
    .border-line{
        border: 1px dashed #1B5E20 !important;
        margin: 0 0 5px 0;
    }
    .border-line-top{
        border-top: 1px dashed #1B5E20 !important;
    }
    .cursor-move{
        cursor: move;
    }
</style>
