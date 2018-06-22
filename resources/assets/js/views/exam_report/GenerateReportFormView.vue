<script>
	export default {
		data() {
			return {
				showStudent: false,
				showSubmitButton: false,
				academicInfos: []
			}
		},
		methods: {
			onClassChange() {
				this.fetchStudents();
			},
			onStudentChange() {
				let academinInfo_id = $('#academicInfo_id').val();

				if(academinInfo_id > 0) {
					this.showSubmitButton = true;
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
			}
		},
		created() {
			this.fetchStudents();
		}
	}
</script>