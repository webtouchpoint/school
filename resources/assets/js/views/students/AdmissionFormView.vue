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
			},
			calculatePercentage() 
			{
				let total_marks = $('#total_marks').val();
				let marks_obtained = $('#marks_obtained').val();

				if (total_marks > 0 && marks_obtained > 0 && total_marks >= marks_obtained) {
					let percentage = (marks_obtained / total_marks ) * 100;
					$('#percentage_of_marks_obtained').val(percentage);
				}
			}
		},
		created() {
			this.fetch();
		}
	}
</script>