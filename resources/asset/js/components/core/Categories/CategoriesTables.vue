<template>
  <v-container
    id="regular-tables"
    fluid
    tag="section"
  >
    <base-v-component
      heading="Категории"
    />

    <base-material-card
      icon="mdi-clipboard-text"
      title="Таблица Категорий"
      class="px-5 py-3"
    >
      <v-simple-table>
        <thead>
          <tr>
            <th class="primary--text">
              ID
            </th>
            <th class="primary--text">
              Алиас
            </th>
            <th class="primary--text">
              Название
            </th>
            <th class="primary--text">
              Активность
            </th>
            <th class="text-right primary--text">
              Дата
            </th>
            <th></th>
          </tr>
        </thead>

        <tbody>

          <tr
            v-for="(item, index) in categories"
          >
            <td>{{item.id}}</td>
            <td>{{item.slug}}</td>
            <td>{{item.title}}</td>
            <td>
                <v-switch
                    v-model="item.active"
                ></v-switch>
            </td>
            <td class="text-right">
              {{item.created_at}}
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
                        v-for="(item, index) in items"
                        :key="index"
                        @click=""
                    >
                        <v-list-item-icon>
                            <v-icon>{{item.icon}}</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                          <v-list-item-title>{{item.title}}</v-list-item-title>
                      </v-list-item-content>
                    </v-list-item>
                  </v-list>
                </v-menu>
            </td>
          </tr>
        </tbody>
      </v-simple-table>
    </base-material-card>

    <div class="py-3" />
  </v-container>
</template>

<script>
    import BaseMaterialCard from '../../base/MaterialCard.vue';
    import BaseVComponent from '../../base/VComponent.vue';
    export default{
        data: function () {
            return {
                categories: this.$store.state.data.categories,
                items:[
                {
                    title: 'Удалить',
                    icon: 'mdi-delete'
                },
                {
                    title: 'Редактировать',
                    icon: 'mdi-pencil'
                }
              ]
            }
        },

        components: {
            BaseMaterialCard,
            BaseVComponent
        }
    }
</script>
