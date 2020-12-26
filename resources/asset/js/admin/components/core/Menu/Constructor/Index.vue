<template>
    <v-card
        class="mt-0 mb-0 elevation-0 d-flex align-center"
        min-height="400px"
    >
        <v-card-text>
            <div class="text-center"
                 v-if="!areaVisibilities.length"
            >
                <v-sheet color="lighten-2">
                    Довавьте область для работы с конструктором
                </v-sheet>
            </div>
            <template v-if="areaVisibilities.length">
                <v-row>
                    <v-col cols="12" md="4">
                        <v-select
                            class="text-caption"
                            :items="areaVisibilities"
                            label="Выберите меню для изменения:"
                            item-text="title"
                            item-value="id"
                            dense
                            outlined
                        ></v-select>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col cols="12" md="4">
                        <panel-left

                        ></panel-left>
                    </v-col>
                    <v-col cols="12" md="8">
                        <panel-right

                        ></panel-right>
                    </v-col>
                </v-row>
            </template>
        </v-card-text>
    </v-card>
</template>

<script>
    import PanelLeft from "./PanelLeft";
    import PanelRight from "./PanelRight";

    import { createNamespacedHelpers } from 'vuex';

    const { mapGetters } = createNamespacedHelpers('menu');

    export default{
        components:{
            PanelLeft,
            PanelRight
        },
        data: function (){
            return {
                areaVisibility: []
            }
        },
        computed: {
            ...mapGetters([
                'areaVisibilities'
            ]),
        }
    }
</script>