<template>
    <Head title="Kezdőoldal" />

    <AuthenticatedLayout>
        <template #header>
            Kezdőoldal
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

                <div class="flex flex-col justify-center items-center md:flex-row">
                    <card title="Állatfajok száma" :description="animalTypesCount"/>
                    <card title="Állatok száma" :description="animalsCount"/>
                    <card title="Teljes állatorvosi költség" :description="hufCurrency.format(costOfMedicalRecords)"/>
                </div>
                <div class="flex justify-between flex-col md:flex-row">    
                    <div class="mt-10">                    
                        <bar-chart 
                            :data="currentSuppliesCostData" 
                            :labels="currentSuppliesCostLabels" 
                            :title="currentSuppliesCostChartTitle"
                        />
                    </div>
                    <div class="mt-10">                    
                        <bar-chart 
                            :data="prevSuppliesCostData" 
                            :labels="prevSuppliesCostLabels" 
                            :title="prevSuppliesCostChartTitle"
                        />
                    </div>
                </div>
                <div class="flex justify-between flex-col md:flex-row">   
                    <div class="mt-10">                    
                        <bar-chart 
                            :data="supplyCountData" 
                            :labels="supplyCountLabels" 
                            :title="supplyCountTitle"
                        />
                    </div> 
                    <div class="mt-10">                    
                        <bar-chart 
                            :data="suppliableCountData" 
                            :labels="suppliableCountLabels" 
                            :title="suppliableCountTitle"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3';
import Card from '@/Components/Custom/Card.vue'
import BarChart from '@/Components/Custom/BarChart.vue'
import { hufCurrency, changeSuppliableType } from '@/utils/utils'

const props = defineProps({
    animalsCount: Number,
    animalTypesCount: Number,
    costOfMedicalRecords: Number,
    suppliesInPrevMonth: Array,
    suppliesInCurrentMonth: Array,
    supplyCount: Array,
    suppliableCount: Array
})

const prevSuppliesCostLabels = props.suppliesInPrevMonth?.map(item => changeSuppliableType(item.suppliable_type))
const prevSuppliesCostData = props.suppliesInPrevMonth?.map(item => item.summed_price)
const prevSuppliesCostChartTitle = "ELŐZŐ HÓNAP KÉSZLET KÖLTSÉGEI"

const currentSuppliesCostLabels = props.suppliesInCurrentMonth?.map(item => changeSuppliableType(item.suppliable_type))
const currentSuppliesCostData = props.suppliesInCurrentMonth?.map(item => item.summed_price)
const currentSuppliesCostChartTitle = "AKTUÁLIS HÓNAP KÉSZLET KÖLTSÉGEI"

const supplyCountLabels = props.supplyCount?.map(item => item.name)
const supplyCountData = props.supplyCount?.map(item => item.supply_count)
const supplyCountTitle = "BESZÁLLÍTÓK BESZÁLLÍTÁSAINAK SZÁMA"

const suppliableCountLabels = props.suppliableCount?.map(item => changeSuppliableType(item.suppliable_type))
const suppliableCountData = props.suppliableCount?.map(item => item.suppliable_count)
const suppliableCountTitle = "EGYES TÍPUSOKBÓL LEADOTT BESZERZÉSEK SZÁMA"
</script>
