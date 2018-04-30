<script>
	export default {
		data() {
			return {
				isMonthlyFee: false,
			}
		},
		methods: {
			onFeesCategoryChange() {
				this.checkIsMonthlyOrNot();
			},
			checkIsMonthlyOrNot()
			{
				var e = document.getElementById("fees_category_id");
				var val = e.options[e.selectedIndex].text;
				val === 'Monthly' ? this.isMonthlyFee = true : this.isMonthlyFee = false;
			}
		},
		created() {
			this.checkIsMonthlyOrNot();
		}
	}
</script>