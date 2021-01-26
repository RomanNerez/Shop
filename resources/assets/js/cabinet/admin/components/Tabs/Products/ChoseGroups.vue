<template>
    <div class="b-steps">
        <div class="b-colum">
            <div class="groups-list groups-list--chose">
                <div class="groups-list__wrap">
                    <div class="groups-list__items"
                         v-for="group in groups"
                         :key="group.id"
                    >
                        <div class="groups-list__items-head">
                            <div class="groups-list__name">
                                <span class="items-head__title">{{ group.content.ru.title }}</span>
                            </div>
                        </div>
                        <div class="groups-list__items-wrap">
                            <div class="groups-list__items-item"
                                 v-for="item in group.subs"
                                 :key="item.id"
                                 v-if="item.status"
                            >
                                <v-checkbox
                                    class="ma-0"
                                    v-model="value.subs"
                                    :value="item.id"
                                    color="success"
                                    hide-details
                                ></v-checkbox>
                                <div class="groups-list__box">
                                    <span>{{ item.content.ru.title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
	export default{
        props:['value', 'local', 'status', 'langs', 'select', 'tabSelect', 'other', 'index'],
		data: function() {
			return {
                alert: {
                    show: false,
                    text: null
                }
			}
		},
        computed: {
            rootCatalog: function() {
                return this.$store.getters.storeData.root_catalog;
            },
            groups: function () {
                return this.$store.getters.storeData.data.groups.filter(item => {
                    return item.status && item.subs.length && (item.categories_id === this.other || item.categories_id === this.rootCatalog.id);
                })
            }
        },
        methods:{
            validate: function () {
                if ( this.value.status && !Boolean(this.value.subs.length) ) {
                    return {
                        result: false,
                        index: this.index,
                        alert: 'Выберите хотя бы одну группу, перед публикацией'
                    };
                }
                return {
                    result: true
                };
            }
        }
	}
</script>
