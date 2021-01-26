<template>
    <v-card>
        <v-card-title class="py-0 table-header">
            <v-sheet style="position: relative; top: -24px; transition: .3s ease; z-index: 1" class="pa-7 text-center green rounded b-user-info__square"
                elevation="5"
            >
                <v-icon class="theme--dark" style="font-size: 32px;">
                    mdi-account-plus
                </v-icon>

            </v-sheet>
            <span class="mb-6 font-weight-light user-info__title">Подписки</span>
            <v-spacer></v-spacer>
        </v-card-title>
        <v-simple-table
            :fixed-header="true"
            style='overflow-x: hidden;padding: 0 16px 16px 16px;'
        >
            <thead>
                <tr>
                    <th class="green--text">
                        ID
                    </th>
                    <th class="green--text">
                        Email
                    </th>
                    <th class="green--text">
                        Дата
                    </th>
                </tr>
            </thead>
            <tbody 
            >
                <tr v-for="(item,index) in dat">
                    <td class="text-left" style="width: 10%;">{{item.id}}</td>
                    <td class="text-left" style="width: 80%;">{{item.email}}</td>
                    <td class="text-left" style="width: 10%;">{{item.created_at}}</td>
                </tr>
            </tbody>
        </v-simple-table>
    </v-card>
</template>

<script>
    export default{
        name: 'subscribers-question',
        data: function() {
            return {
                dat: this.$store.state.data.followers,
            }
        },
    }
</script>