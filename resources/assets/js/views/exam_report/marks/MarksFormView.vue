<script>
	export default {
		data() {
			return {
				showSubject: false,
				subjects: []
			}
		},
		methods: {
			onClassChange() {
				this.fetch();
			},
			fetch() {
				let class_id = $('#school_class_id').val();

				if(class_id > 0) {
					axios.get('/settings/subjects/fetch-by-class-id/' + class_id)
						.then(({data}) => this.subjects = data);
					this.showSubject = true;
				}
			}
		},
		created() {
			this.fetch();
		}
	}
</script>