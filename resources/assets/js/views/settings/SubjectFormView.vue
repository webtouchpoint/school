<script>
	export default {
		data() {
			return {
				showSubjectGroup: false,
				subjectGroups: []
			}
		},
		methods: {
			onClassChange() {
				this.fetch();
			},
			fetch() {
				let class_id = $('#school_class_id').val();

				if(class_id > 0) {
					axios.get('/settings/subject-groups/fetch-by-class-id/' + class_id)
						.then(({data}) => this.subjectGroups = data);
					this.showSubjectGroup = true;
				}
			}
		},
		created() {
			this.fetch();
		}
	}
</script>