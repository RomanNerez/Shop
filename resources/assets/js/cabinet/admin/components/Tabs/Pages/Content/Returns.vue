<template>
    <v-container class="pt-0 content-page">
        <v-row>
            <v-col class="pt-0">
                <v-card-title class="pa-0 pb-4">Описание</v-card-title>

                <ckeditor
                    v-model="value.content[local].data.desc"
                    :config="editorConfig"
                ></ckeditor>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import CKEditor from 'ckeditor4-vue';

    export default {
        props: ['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect', 'alert'],
        components: {
            ckeditor: CKEditor.component
        },
        data: function () {
            return {
                editorConfig: {
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=image',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=image&_token=',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
                    contentsCss: '/library/css/editor.css',
                    height: '42vh',
                    removeButtons: 'Scayt,Anchor,Specialchar,Styles,About,Blockquote'
                }
            }
        },
        watch: {
            local: function (a, b) {
                let desc = this.value.content[a].data.desc;

                if (!desc) {
                    this.value.content[a].data.desc = this.value.content[b].data.desc;
                }
            }
        },
        methods: {
            validate: function () {
                for (let i = 0; i < this.langs.length; i++) {
                    let local = this.langs[i].local,
                        lang = this.langs[i].id;

                    if (!this.value.content[local].data.desc) {
                        this.$emit('update:tabSelect', 1);
                        this.$emit('update:select', lang);

                        if (this.local === local) {
                            this.$emit('update:alert', {
                                type: 'warning',
                                text: 'Необходимо заполнить описание'
                            });
                        }

                        return false;
                    }
                }

                return true
            }
        }
    }
</script>
