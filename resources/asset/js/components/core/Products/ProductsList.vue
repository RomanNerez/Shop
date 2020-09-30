<template>
	<v-container
        id="regular-tables"
        fluid
        tag="section"
    >
        <base-v-component
            heading="Продукты"
        />
        <base-material-card
            icon="mdi-clipboard-text"
            title="Таблица Продуктов"
            class="px-5 py-3"
            :disabled="disabledTable"
        >   
            <v-btn
                icon
                v-on:click="$emit('update:dialog', true)"
            >
                <v-icon>mdi-plus</v-icon>
            </v-btn>
            <v-simple-table
                disabled
            >
                <thead>
                    <tr>
                        <th class="primary--text">ID</th>
                        <th class="primary--text">Алиас</th>
                        <th class="primary--text">Название</th>
                        <th class="primary--text">Активность</th>
                        <th class="text-right primary--text">Дата</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(products, index) in products"
                    >
                        <td>{{products.id}}</td>
                        <td>{{products.slug}}</td>
                        <td>{{products.title}}</td>
                        <td>
                            <v-switch
                                v-model="products.active"
                                :false-value="0"
                                :true-value="1"
                                @change="active(products.id, products.active)"
                            ></v-switch>
                        </td>
                        <td class="text-right">
                            {{products.created_at}}
                        </td>
                        <td>
                            <v-menu offset-y>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn
                                        depressed
                                        icon
                                        v-bind="attrs"
                                        v-on="on"
                                    >
                                        <v-icon>mdi-share-variant</v-icon>
                                    </v-btn> 
                                </template>
                                <v-list>
                                    <v-list-item
                                        v-for="(param, indexParams) in params"
                                        :key="indexParams"
                                        v-on:click="param.function(products.id)"
                                    >
                                        <v-list-item-icon>
                                            <v-icon>{{param.icon}}</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-title>{{param.title}}</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-list>
                            </v-menu>
                        </td>
                    </tr>
                </tbody>
            </v-simple-table>
        </base-material-card>
        <v-snackbar
            v-model="snackbar.show"
        >
            {{ snackbar.text }}
            <template v-slot:action="{ attrs }">
                <v-btn
                    color="pink"
                    text
                    v-bind="attrs"
                    @click="snackbar.show = false"
                >
                    Close
                </v-btn>
            </template>
        </v-snackbar>
        <template>
            <v-row justify="center">
                <v-dialog v-model="warningModal" max-width="390">
                    <v-card>
                        <v-card-title class="headline">Уведомление</v-card-title>
                        <v-card-text>Вы точно хотите удалить категорию?</v-card-text>
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn 
                                color="green darken-1" 
                                text 
                                @click="warningModal = selectedId = false"
                            >
                                Отмена
                            </v-btn>
                            <v-btn 
                                color="green darken-1" 
                                text 
                                @click="deleteCategory(selectedId)"
                            >
                                Подтвердить
                            </v-btn>
                    </v-card-actions>
                  </v-card>
                </v-dialog>
            </v-row>
        </template>
    </v-container>
</template>

<script>
	import BaseMaterialCard from '../../base/MaterialCard.vue';
    import BaseVComponent from '../../base/VComponent.vue';
	export default{
		props: ['products'],
		components: {
            BaseMaterialCard,
            BaseVComponent
        },
		data: function () {
			return {
				warningModal: false,
				disabledTable: false,
				selectedId: false,
				snackbar:{
					show: false,
					title: '',
				},
				params:[
	                {
	                    title: 'Удалить',
	                    icon: 'mdi-delete',
	                    function: (id) => {
	                        this.warningModal = true;
	                        this.selectedId = id;
	                    }
	                },
	                {
	                    title: 'Редактировать',
	                    icon: 'mdi-pencil',
	                    function: (id) => {
	                        this.$parent.selected = id;
	                        this.$emit('update:dialog', true)
	                    }
	                }
              	]
			}
		},
		methods:{

		}
	}
</script>