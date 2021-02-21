export default {
    data: function() {
        return {
            data: this.$store.state.data.content.body
        }
    },
    computed: {
        items() {
            return this.data.base.items;
        }
    },
    methods: {
        getResult(val, units, selected) {
            let keys = JSON.parse(JSON.stringify(selected)),
                key = keys.join('/'),
                result = 0;

            if (units[key]) {
                result = val * units[key];
            }else{
                key = keys.reverse().join('/');

                if (units[key]) {
                    result = val / units[key];
                }else{
                    result = val;
                }
            }

            if (result < 1000) {
                return result;
            }else{
                let len = Math.ceil(Math.log10(result + 1)) - 4,
                    extent = 10**len;

                return (Math.round((result / extent) * 100) / 100) + ' * 10<sup>'+ len +'</sup>';
            }
        }
    }
};
