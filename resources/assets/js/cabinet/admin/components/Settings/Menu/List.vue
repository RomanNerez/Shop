<template>
    <v-card
        class="mt-0 mb-0 elevation-0"
        min-height="400px"
    >
        <v-card-text>
            <v-row>
                <v-col>
                    <v-form
                        ref="form"
                    >
                        <v-row>
                            <v-col cols="12" md="6" sm="6">
                                <v-text-field
                                    v-model="title"
                                    :counter="15"
                                    :rules="titleRules"
                                    label="Называние"
                                    required
                                    outlined
                                    dense
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="3">
                                <v-btn
                                    width="100%"
                                    dense
                                    color="primary"
                                    v-on:click="getAction"
                                    :loading="btnLoading"
                                >
                                    {{ statusEdit ? 'Редактировать' : 'Сохранить' }}
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-form>
                </v-col>
            </v-row>
            <v-row>
                <v-col>
                    <v-card
                        class="mt-0 mb-0 elevation-0 d-flex align-center"
                        min-height="200"
                    >
                        <v-card-text
                            class="pa-0"
                        >
                            <div class="text-center"
                                 v-show="!areaVisibilities.length"
                            >
                                <v-sheet color="lighten-2">
                                    На данный момент нет не одной области
                                </v-sheet>
                            </div>
                            <v-simple-table
                                v-show="areaVisibilities.length"
                            >
                                <template v-slot:default>
                                    <thead>
                                    <tr>
                                        <th class="text-right">Название</th>
                                        <th class="text-right">Создано</th>
                                        <th class="text-right">Последнее изменение</th>
                                        <th class="text-right"></th>
                                    </tr>
                                    </thead>
                                    <transition-group name="list" tag="tbody">
                                        <tr v-for="(item, index) in areaVisibilities"
                                            :key="item.id"
                                            class="list-complete-item"
                                            :class="{'green lighten-3': edit.id === item.id}"
                                        >
                                            <td class="text-right">{{ item.title }}</td>
                                            <td class="text-right">{{ item.created_at }}</td>
                                            <td class="text-right">{{ item.updated_at }}</td>
                                            <td class="text-right">
                                                <v-btn
                                                    icon
                                                    v-on:click="getAreaVisibilityForEdit(item)"
                                                >
                                                    <v-icon>mdi-pencil</v-icon>
                                                </v-btn>
                                                <v-btn
                                                    icon
                                                    v-on:click="deleteAreaVisibility(item.id)"
                                                >
                                                    <v-icon>mdi-delete</v-icon>
                                                </v-btn>
                                            </td>
                                        </tr>
                                    </transition-group>
                                </template>
                            </v-simple-table>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        </v-card-text>
    </v-card>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';

    const { mapGetters } = createNamespacedHelpers('MenuAreaVisibilities');

    export default {
        data () {
            return {
                title: '',
                btnLoading: false,
                edit: {},
                titleRules: [
                    v => !!v || 'Название обязательно!',
                    v => (v && v.length <= 16) || 'Название не дожно превышать 15-ти символов',
                ],
            }
        },
        computed: {
            ...mapGetters([
                'areaVisibilities'
            ]),
            statusEdit: function () {
                return !!Object.keys(this.edit).length;
            },
            getAction: function () {
                return this.statusEdit ? this.editAreaVisibility : this.addAreaVisibility;
            }
        },
        methods:{
            getAreaVisibilityForEdit: function (item) {
                if (this.edit.id == item.id) {
                    this.edit = {};
                    this.title = '';
                    this.$refs.form.reset();
                    return;
                }
                this.title = item.title
                this.edit = item;
            },
            editAreaVisibility: function(){
                if (!this.$refs.form.validate()) {
                    return;
                }
                const data = {
                    id: this.edit.id,
                    title: this.title
                }
                this.btnLoading = true;
                this.$store.dispatch(
                    'MenuAreaVisibilities/editAreaVisibility',
                    data
                ).then((response)=>{
                    this.$store.commit(
                        'MenuAreaVisibilities/editAreaVisibility',
                        response.data
                    );
                    this.edit = {};
                    this.title = '';
                }).catch((error)=>{
                }).finally(()=>{
                    this.btnLoading = false;
                    this.$refs.form.reset();
                });
            },
            deleteAreaVisibility: function(id){
                this.$store.dispatch(
                    'MenuAreaVisibilities/deleteAreaVisibility',
                    {id}
                ).then((response)=>{
                    this.getAreaVisibilityForEdit(this.edit);
                    this.$store.commit(
                        'MenuAreaVisibilities/deleteAreaVisibility',
                        id
                    );
                    this.$store.commit(
                        'Menu/deleteMenuByAreaVisibility',
                        id
                    );
                }).catch((error)=>{
                });
            },
            addAreaVisibility: function () {
                if (!this.$refs.form.validate()) {
                    return;
                }
                this.btnLoading = true;
                this.$store.dispatch(
                    'MenuAreaVisibilities/addAreaVisibility',
                    {
                        title: this.title
                    }
                ).then((response)=>{
                    this.$store.commit(
                        'MenuAreaVisibilities/addAreaVisibility',
                        response.data
                    );
                    this.title = '';
                }).catch((error)=>{
                }).finally(()=>{
                    this.btnLoading = false;
                    this.$refs.form.reset();
                });
            }
        }
    }
</script>
<style>
    .list-complete-item {
        transition: all 1s;
    }
    .list-enter-active, .list-leave-active {
        transition: all 1s;
    }
    .list-enter, .list-leave-to {
        opacity: 0;
        transform: translateY(30px);
    }
</style>
