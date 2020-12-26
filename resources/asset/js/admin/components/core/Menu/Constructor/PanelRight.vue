<template>
    <v-card
        class="mt-0 mb-0 elevation-1"
    >
        <v-card-title class="text-caption justify-space-between">
            Добавьте элементы меню из столбца слева.
            <v-btn small color="success">
                Сохранить
            </v-btn>
        </v-card-title>
        <v-divider></v-divider>
        <v-card-text
            min-heigth="100px"
        >
            <v-list>
                <draggable v-model="myArray">
                    <v-list-item
                        class="border-line"
                        v-for="element in myArray"
                        :key="element.id"
                    >
                        {{element.name}}
                    </v-list-item>
                </draggable>
            </v-list>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-title class="text-caption">
            Настройки меню
        </v-card-title>
        <v-card-text>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </v-card-text>
    </v-card>
</template>

<script>
    export default{
        data: function (){
            return {
                myArray: [
                    {
                        id: 1,
                        name:'Roman',
                    },
                    {
                        id: 2,
                        name:'Bogdan',
                    },
                    {
                        id: 3,
                        name:'Yura',
                    }
                ],
            }
        }
    }
</script>

<style>
    .border-line{
        border: 1px solid #ccc;
        margin: 0 0 2px 0;
    }
</style>