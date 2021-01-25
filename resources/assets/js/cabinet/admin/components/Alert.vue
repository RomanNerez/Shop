<template>
    <v-dialog
        v-model="state"
        max-width="400"
    >
        <v-card>
            <v-card-title class="headline"
            >
                {{heading}}
            </v-card-title>
            <v-card-text>
                {{message}}
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <template v-if="onAction">
                    <v-btn
                    color="green darken-1"
                    text
                    v-on:click="onAction"
                    >
                        Подтверждаю
                    </v-btn>
                </template>

                <v-btn
                    color="green darken-1"
                    text
                    v-on:click="$emit('update:state', false)"
                >
                    Закрыть
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>           

<script>
    export default {
        name: 'atertform',
        props: {
            state: {
                type: Boolean,
                default: false,
            },
            heading: {
                type: String,
                default: 'warning',
            },
            message: {
                type: String,
                default: '',
            },
            onAction: {
                type: Function,
            },
        },      
    }
</script>



