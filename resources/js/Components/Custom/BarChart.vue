<template>
    <Bar
        id="my-chart-id"
        :data="chartData"
        :options="chartOptions"
        :style="barStyles"
    />
</template>

<script setup>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

const { labels, data, title } = defineProps(['labels', 'data', 'title']);

const chartData = {
    labels: labels,
    datasets: [{ 
        data: data,
        label: '', // "Költségek (Ft)",
        backgroundColor: '#1434A4',
        borderColor: '#1434A4',
        borderWidth: 1
    }]
}

const chartOptions = {
    responsive: true,
    plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: true,
            text: title,
        },
    },
}

const barStyles = {
    height: `${300}px`,
    position: 'relative'
}
</script>
