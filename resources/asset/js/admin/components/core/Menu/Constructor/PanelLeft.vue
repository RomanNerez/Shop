<template>
    <v-expansion-panels accordion>
        <v-expansion-panel
            v-for="(panel, index) in panels"
            :key="index"
        >
            <v-expansion-panel-header>
                {{panel.title}}
            </v-expansion-panel-header>
            <v-expansion-panel-content>
                <v-tabs
                    v-model="tab"
                    height="25px"
                    slider-size="1"
                >
                    <v-tab
                        class="text-caption pa-0"
                        style="min-width: 50px"
                    >
                        Самые свежие
                    </v-tab>
                    <v-tab
                        class="text-caption pa-0"
                        style="min-width: 50px"
                    >Все</v-tab>
                    <v-tab
                        class="text-caption pa-0"
                        style="min-width: 50px"
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
                                    class="ma-0"
                                    label="secondary"
                                    color="secondary"
                                    value="secondary"
                                    hide-details
                                ></v-checkbox>
                                <v-checkbox
                                    class="ma-0"
                                    label="secondary"
                                    color="secondary"
                                    value="secondary"
                                    hide-details
                                ></v-checkbox>
                                <v-checkbox
                                    class="ma-0"
                                    label="secondary"
                                    color="secondary"
                                    value="secondary"
                                    hide-details
                                ></v-checkbox>
                                <v-divider
                                    class="mt-1"
                                ></v-divider>
                                <div
                                    class="d-flex align-center justify-space-between"
                                >
                                    <v-checkbox
                                        label="Выбрать всё"
                                        hide-details
                                    ></v-checkbox>
                                    <v-btn
                                        x-small
                                        color="primary"
                                        class="text-caption mt-6"
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
                                    class="ma-0"
                                    label="secondary"
                                    color="secondary"
                                    value="secondary"
                                    hide-details
                                ></v-checkbox>
                                <v-checkbox
                                    class="ma-0"
                                    label="secondary"
                                    color="secondary"
                                    value="secondary"
                                    hide-details
                                ></v-checkbox>
                                <v-checkbox
                                    class="ma-0"
                                    label="secondary"
                                    color="secondary"
                                    value="secondary"
                                    hide-details
                                ></v-checkbox>
                                <v-divider
                                    class="mt-1"
                                ></v-divider>
                                <div
                                    class="d-flex align-center justify-space-between"
                                >
                                    <v-checkbox
                                        label="Выбрать всё"
                                        hide-details
                                    ></v-checkbox>
                                    <v-btn
                                        x-small
                                        color="primary"
                                        class="text-caption mt-6"
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
                                    label="Outlined"
                                    single-line
                                    dense
                                    outlined
                                ></v-text-field>
                                <v-checkbox
                                    class="ma-0"
                                    label="secondary"
                                    color="secondary"
                                    value="secondary"
                                    hide-details
                                ></v-checkbox>
                                <v-checkbox
                                    class="ma-0"
                                    label="secondary"
                                    color="secondary"
                                    value="secondary"
                                    hide-details
                                ></v-checkbox>
                                <v-checkbox
                                    class="ma-0"
                                    label="secondary"
                                    color="secondary"
                                    value="secondary"
                                    hide-details
                                ></v-checkbox>
                                <v-divider
                                    class="mt-1"
                                ></v-divider>
                                <div
                                    class="d-flex align-center justify-space-between"
                                >
                                    <v-checkbox
                                        label="Выбрать всё"
                                        hide-details
                                    ></v-checkbox>
                                    <v-btn
                                        x-small
                                        color="primary"
                                        class="text-caption mt-6"
                                    >
                                        Добавить
                                    </v-btn>
                                </div>
                            </v-card-text>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </v-expansion-panels>
</template>

<script>
    export default{
        data: function (){
            return {
                tab: null,
                panels:[
                    {
                        title: 'Категории',
                        body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                    },{
                        title: 'Подкатегории',
                        body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                    },{
                        title: 'Произвольные ссылки',
                        body: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
                    }
                ],
                areaVisibility:['Header', 'Footer'],
            }
        }
    }
</script>