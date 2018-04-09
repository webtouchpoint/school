<script>
	export default {
		data() {
			return {
				showSection: false,
				sections: []
			}
		},
		methods: {
			onClassChange() {
				this.fetch();
			},
			fetch() {
				let class_id = $('#school_class_id').val();

				if(class_id > 0) {
					axios.get('/settings/sections/fetch-by-class-id/' + class_id)
						.then(({data}) => this.sections = data);
					this.showSection = true;
				}
			}
		},
		created() {
			this.fetch();
		}
	}
</script>