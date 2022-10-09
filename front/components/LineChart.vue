<script>
import { Line } from 'vue-chartjs';

export default ({
    name: "line-chart",
    extends: Line,
    mounted() {
        this.renderChart({
            labels: ['2022-10-01', '2022-10-02', '2022-10-03', '2022-10-04', '2022-10-05', '2022-10-06', '2022-10-07'],
                datasets: [{
                    label: '今月の入出金推移',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
        });
    }
})
</script>
