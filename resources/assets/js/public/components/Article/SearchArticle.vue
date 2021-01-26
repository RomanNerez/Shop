<template>
    <div class="search">
        <autocomplete
            :search="search"
            :placeholder="__('Поиск по базе знаний')"
            :aria-label="__('Поиск по базе знаний')"
            :get-result-value="resultSearch"
            :default-value="defaultValue"
            @submit="submitSearch"
            ref="autocomplete"
            :debounce-time="500"
        ></autocomplete>
        <img class="search__svg" :src="_asset('library/img/search-blue.svg')" alt="">
    </div>
</template>

<script>
    import Autocomplete from '@trevoreyre/autocomplete-vue';

    export default {
        data: function() {
            return {
                value: ''
            }
        },
        components: {
            Autocomplete
        },
        computed: {
            defaultValue: function () {
                let query = this.$store.state.data.search;

                return query ? query : '';
            }
        },
        methods: {
            search(input) {
                this.value = input;

                return new Promise(resolve => {
                    if (input.length < 3) {
                        return resolve([])
                    }

                    axios.get( this._locale(window.location.pathname +'?is-async=true&search='+ input) )
                    .then((response) => {
                        if (this.value) {
                            let data = response.data.list;

                            if (data.length) {
                                resolve(data)
                            }else{
                                resolve([
                                    {
                                        url: false,
                                        content: {
                                            title: this.__('Нет совпадений...')
                                        }
                                    }
                                ])
                            }
                        } else {
                            resolve([])
                        }
                    })
                    .catch(() => {
                        this.$notify({
                            group: 'foo',
                            type: 'error',
                            title: this.__('Произошла ошибка'),
                            text: this.__('Во время обработки запроса произошла ошибка, пожалуйста обновите страницу и попробуйте еще раз')
                        });
                    })
                })
            },
            resultSearch(result) {
                return result.content.title;
            },
            submitSearch() {
                clearTimeout(window._debounce);
                window._debounce = setTimeout(() => {
                    this.$root.search_data = this.value;
                }, 50)
            }
        }
    }
</script>
