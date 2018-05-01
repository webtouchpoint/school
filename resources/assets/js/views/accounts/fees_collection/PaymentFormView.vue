<script>
	export default {
		data() {
			return {
				showStudent: false,
				showFees: false,
				showSubmitButton: false,
				academicInfos: [],
				fees: [],
				total: 0
			}
		},
		methods: {
			onClassChange() {
				this.fetchStudents();
			},
			onStudentChange() {
				this.fetchFees();
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
			fetchFees() {
				let academinInfo_id = $('#academicInfo_id').val();


				if(academinInfo_id > 0) {
					axios.get('/settings/fees-structures/fetch-by-academicInfo-id/' + academinInfo_id)
						.then(({data}) => this.fees = data);
					this.showFees = true;
				}
			},
			onFeesCheck(e, amount) {
				if (e.target.checked) {
					this.total += amount;
				} else {
					this.total -= amount;
				}
			},
			onAccountsHeadAndPaymentModeChange() {
				let accounts_head_id = $('#accounts_head_id').val();
				let mode_index = $('#mode')[0].selectedIndex;

				if(accounts_head_id > 0 && mode_index > 0) {
					this.showSubmitButton = true;
				}
			}
		},
		created() {
			this.fetchStudents();
			this.fetchFees();
		}
	}
</script>