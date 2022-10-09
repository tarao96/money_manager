<script>
import { Bar } from 'vue-chartjs';

export default ({
    name: 'BarChart',
    extends: Bar,
    mounted() {
        this.renderChart({
            labels: ['1月', '2月', '3月', '4月', '5月', '6月'],
                datasets: [
                    {
                        label: '収入ー支出の推移',
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        data: [40, 20, 12, 60, 22, 34]
                    }
                ]
        });
    }
})
</script>
