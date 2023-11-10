<template>
    <Head title="Kezdőoldal" />

    <AuthenticatedLayout>
        <template #header>
            Kezdőoldal
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <div class="flex flex-col justify-center items-center md:flex-row">
                    <Card title="Állatfajok száma" :description="animalTypesCount"/>
                    <Card title="Állatok száma" :description="animalsCount"/>
                    <Card title="Teljes állatorvosi költség" :description="hufCurrency.format(costOfMedicalRecords)"/>
                </div>

                <div class="mt-10">                    
                    <Bar
                        id="my-chart-id"
                        :data="chartData"
                        :options="chartOptions"
                        :style="barStyles"
                    />
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3';
import Card from '@/Components/Custom/Card.vue'
import { hufCurrency, changeSuppliableType } from '@/utils/utils'
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

const props = defineProps({
    animalsCount: Number,
    animalTypesCount: Number,
    costOfMedicalRecords: Number,
    suppliesInPrevMonth: Array,
})

const chartData = {
    labels: props.suppliesInPrevMonth?.map(item => changeSuppliableType(item.suppliable_type)),
    datasets: [{ 
        data: props.suppliesInPrevMonth?.map(item => item.summed_price),
        label: "Költségek (Ft)",
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
            text: "Előző hónap készlet költségei",
        },
    },
}

const barStyles = {
    height: `${300}px`,
    position: 'relative'
}
  
</script>
