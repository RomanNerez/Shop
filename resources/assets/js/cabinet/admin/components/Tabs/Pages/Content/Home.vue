<template>

</template>

<script>
    export default {
        props: ['value', 'local', 'status', 'langs', 'valid', 'select', 'tabSelect'],
        data: function () {
            return {
                options: {
                    animation: 200,
                    disabled: false
                }
            }
        },
        methods: {
            selectFile: function () {
                window.open('/laravel-filemanager?type=image', 'FileManager', 'width=1280,height=700');
                return new Promise(resolve => {
                    window.SetUrl = (items) => {
                        resolve(items.slice(0, 6));
                    };
                })
            },
            setMedia: function(current, index, type) {
                this.selectFile().then(response => {
                    if (type !== -1) {
                        const replace = type ? 0 : response.length;

                        current.splice(index, replace, ...response.map((item, index) => {
                            return {
                                id: index + (+new Date()),
                                source: item.url
                            }
                        }))

                        if ( current.length > 6 ) {
                            const delta = current.length - 6;
                            current.splice(-delta, delta);
                        }
                    }else{
                        let source = response[0].url;

                        if ( typeof index === 'number') {
                            current.splice(index, 1, source)
                        }else{
                            current[index] = source
                        }
                    }
                })
            },
            validate: function () {
                return {
                    result: true
                }
            }
        }
    }
</script>
