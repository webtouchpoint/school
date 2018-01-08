<script>
	export default {
		data() {
			return {
				showFeesCategory: false,
				feesCategories: []
			}
		},
		methods: {
			onClassChange() {
				this.fetch();
			},
			fetch() {
				let class_id = $('#school_class_id').val();

				if(class_id > 0) {
					axios.get('/settings/fees-categories/fetch-by-class-id/' + class_id)
						.then(({data}) => this.feesCategories = data);
					this.showFeesCategory = true;
				}
			}
		},
		created() {
			this.fetch();
		}
	}
</script>