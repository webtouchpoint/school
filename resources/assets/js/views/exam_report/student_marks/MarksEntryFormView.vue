<script>
	export default {
		data() {
			return {
				showSubject: false,
				subjects: [],
				academicInfos: []
			}
		},
		methods: {
			onClassChange() {
				this.fetch();
				this.fetchStudents();
			},
			fetch() {
				let class_id = $('#school_class_id').val();

				if(class_id > 0) {
					axios.get('/settings/subjects/fetch-by-class-id/' + class_id)
						.then(({data}) => this.subjects = data);
					this.showSubject = true;
				}
			},
			fetchStudents() {
				let class_id = $('#school_class_id').val();

				let session_id = $('#session').val();

				if(class_id > 0) {
					axios.get('/students/fetch-by-class-id/' + class_id + '/' + session_id)
						.then(({data}) => this.academicInfos = data.data);
					this.showStudent = true;
				}
			},
		},
		created() {
			this.fetch();
			this.fetchStudents();
		}
	}
</script>