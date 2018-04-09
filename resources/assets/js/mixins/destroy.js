export default {
    data() {
        return {
            id: '',
            name: '',
            type: '',
            url: '',
            optional_msg: ''
        }
    },
    methods: {
        destroy(id = '', name = '', type = '', url = '' , modal = '', optional_msg = '') {
            this.id = id;
            this.name = name;
            this.url = url + id;
            this.type = type;
            this.optional_msg = optional_msg;
            $(modal).modal("show");
        }
    }
}
