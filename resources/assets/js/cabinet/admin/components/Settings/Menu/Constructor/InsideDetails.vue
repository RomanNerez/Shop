<template>
    <div>
        <v-tabs
            v-model="tab"
            height="25px"
            slider-size="1"
        >
            <v-tab
                class="text-caption pa-0"
                style="min-width: 50px"
                :disabled="btnLoading"
            >
                Самые свежие
            </v-tab>
            <v-tab
                class="text-caption pa-0"
                style="min-width: 50px"
                :disabled="btnLoading"
            >Все</v-tab>
            <v-tab
                class="text-caption pa-0"
                style="min-width: 50px"
                :disabled="btnLoading"
            >Поиск</v-tab>
        </v-tabs>
        <v-tabs-items
            v-model="tab"
        >
            <v-tab-item>
                <v-card flat
                        class="ma-0 pa-0 elevation-0"
                >
                    <v-card-text
                        class="pr-0 pl-0 pb-0"
                    >
                        <v-checkbox
                            v-model="dataForMenu"
                            v-for="(data, index) in getFreshData"
                            :key="data.id"
                            class="ma-0"
                            :label="data.content.ru.title"
                            :value="data | getAggregateData(that)"
                            hide-details
                        ></v-checkbox>
                        <v-divider
                            class="mt-1"
                        ></v-divider>
                        <div
                            class="d-flex align-center justify-space-between"
                        >
                            <v-checkbox
                                v-model="selectAll"
                                label="Выбрать всё"
                                hide-details
                            ></v-checkbox>
                            <v-btn
                                :disabled="!dataForMenu.length"
                                x-small
                                color="primary"
                                class="text-caption mt-6"
                                @click="createMenus"
                                :loading="btnLoading"
                            >
                                Добавить
                            </v-btn>
                        </div>

                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item>
                <v-card
                    class="ma-0 pa-0 elevation-0"
                >
                    <v-card-text
                        class="pr-0 pl-0"
                    >
                        <v-checkbox
                            v-model="dataForMenu"
                            v-for="(data, index) in getData"
                            :key="data.id"
                            class="ma-0"
                            :label="data.content.ru.title"
                            :value="data | getAggregateData(that)"
                            hide-details
                        ></v-checkbox>

                        <v-divider
                            class="mt-1"
                        ></v-divider>
                        <div
                            class="d-flex align-center justify-space-between"
                        >
                            <v-checkbox
                                v-model="selectAll"
                                label="Выбрать всё"
                                hide-details
                            ></v-checkbox>
                            <v-btn
                                :disabled="!dataForMenu.length"
                                x-small
                                color="primary"
                                class="text-caption mt-6"
                                @click="createMenus"
                                :loading="btnLoading"
                            >
                                Добавить
                            </v-btn>
                        </div>
                    </v-card-text>
                </v-card>
            </v-tab-item>
            <v-tab-item>
                <v-card
                    class="ma-0 pa-0 elevation-0"
                >
                    <v-card-text
                        class="pr-0 pl-0"
                    >
                        <v-text-field
                            v-model="search"
                            single-line
                            dense
                            placeholder="Поиск..."
                            outlined
                            append-icon="mdi-magnify"
                        ></v-text-field>
                        <template
                            v-if="getSearchData.length"
                        >
                            <v-checkbox
                                v-model="dataForMenu"
                                v-for="(data, index) in getSearchData"
                                :key="data.id"
                                class="ma-0"
                                :label="data.content.ru.title"
                                :value="data | getAggregateData(that)"
                                hide-details
                            ></v-checkbox>
                            <v-divider
                                class="mt-1"
                            ></v-divider>
                            <div
                                class="d-flex align-center justify-space-between"
                            >
                                <v-checkbox
                                    v-model="selectAll"
                                    label="Выбрать всё"
                                    hide-details
                                ></v-checkbox>
                                <v-btn
                                    :disabled="!dataForMenu.length"
                                    x-small
                                    color="primary"
                                    class="text-caption mt-6"
                                    @click="createMenus"
                                    :loading="btnLoading"
                                >
                                    Добавить
                                </v-btn>
                            </div>
                        </template>

                    </v-card-text>
                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </div>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';

    const { mapState, mapGetters } = createNamespacedHelpers('MenuAreaVisibilities');

    export default {
        props: {
            data: {
                type: String,
                required: true
            },
            state: {
                type: String,
                required: true
            }
        },
        data: function () {
            return {
                tab: 0,
                search: '',
                dataForMenu: [],
                that: this,
                btnLoading: false
            }
        },
        watch: {
          tab: function () {
              this.dataForMenu = [];
          },
          selectedAreaVisibility: function () {
              this.dataForMenu = [];
          }
        },
        computed:{
            ...mapState([
                'selectedAreaVisibility'
            ]),
            getDataProps: function (){
                return this.data
            },
            getData: function () {
                return this.$store.state.data[this.state][this.data] || [];
            },
            getSearchData: function () {
                return this.getData.filter((item)=>{
                    if (!/[0-9a-zA-Zа-яёАЯЁ]/gi.test(this.search)) {
                        return
                    }
                    var reg = new RegExp(this.search,'gi');
                    return reg.test(item.content.ru.title);
                });
            },
            getFreshData: function () {
                return this.getData.slice(0, 3);
            },
            getObjectData: function(){
                switch (this.tab) {
                    case 0:
                        return 'getFreshData';
                    case 1:
                        return 'getData';
                    case 2:
                        return 'getSearchData';
                }
            },
            selectAll: {
                get: function () {
                    return this.dataForMenu.length ?
                        this.dataForMenu.length == this[this.getObjectData].length
                        : false;
                },
                set: function (value) {
                    var selected = [];
                    if (value) {
                        selected = this[this.getObjectData].map(item=>{
                            return this.$options.filters.getAggregateData(item, this);
                        });
                    }

                    this.dataForMenu = selected;
                }
            }
        },
        filters:{
            getAggregateData: function (value, that) {
                return {
                    instance_id: value.id,
                    instance_type: that.getDataProps,
                    area_visibility_id: that.selectedAreaVisibility
                }
            }
        },
        methods: {
            createMenus: function () {
                this.btnLoading = true;
                this.$store.dispatch('Menu/createMenu',
                    this.dataForMenu
                )
                .then((response)=>{
                    response.data.forEach((item)=>{
                        this.$store.commit(
                            'Menu/addMenu',
                            item
                        );
                    })
                    //this.selectAll = false;
                    this.dataForMenu = [];
                })
                .catch(()=>{

                })
                .finally(()=>{
                    this.btnLoading = false;
                    this.selectAll = false;
                })
            }
        }
    }
</script>
