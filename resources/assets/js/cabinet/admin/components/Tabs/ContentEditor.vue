<template>
    <v-container class="pt-0">
        <ckeditor
            v-model="value.content[local].content"
            :config="editorConfig"
        ></ckeditor>

        <v-snackbar
            v-model="alert.show"
            absolute top center
            elevation="24"
            color="orange darken-1"
        >
            <span v-html="alert.text"></span>
            <template v-slot:action="{ attrs }">
                <v-btn text
                       color="white"
                       v-bind="attrs"
                       @click="alert.show = false"
                >
                    Закрыть
                </v-btn>
            </template>
        </v-snackbar>
    </v-container>
</template>

<script>
    import CKEditor from 'ckeditor4-vue';

    export default {
        props:['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect'],
        data: function() {
            return {
                alert: {
                    show: false,
                    text: null
                },
                editorConfig: {
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=image',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=image&_token=',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                    contentsCss: '/library/css/editor.css',
                    height: '52vh',
                    removeButtons: 'Scayt,Anchor,Specialchar,Styles,About,Blockquote'
                }
            }
        },
        components: {
            ckeditor: CKEditor.component
        },
        watch: {
            local: function (newLocal, oldLocal) {
                for (let keyValue in this.value.content[oldLocal]) {
                    if (!this.value.content[newLocal].content) {
                        this.value.content[newLocal].content = this.value.content[oldLocal].content;
                    }
                }
            }
        },
        methods:{
            validate: function () {
                if ( this.value.status ) {
                    if ( this.value.content[this.local].content === '' ) {
                        this.alert.show = true;
                        this.alert.text = 'Для публикации записи необходимо внести <b>контент</b>';
                        this.$emit('update:tabSelect', 3);

                        return false;
                    }
                }

                return true;
            }
        }
    }
</script>
