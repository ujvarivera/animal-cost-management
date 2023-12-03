<template>
    <div class="p-6 border-b border-gray-200">
        <div class="text-xl flex flex-col justify-center items-center">
            <p class="py-2">
                <span class="font-bold">Név: </span>
                <span>{{ vet.name }}</span>
            </p>
            <p class="py-2">
                <span class="font-bold">Cím: </span>
                <span class="mr-1">{{ vet.zipcode }}</span>
                <span>{{ vet.city }}, </span>
                <span class="mr-1">{{ vet.street }} </span>
                <span>{{ vet.street_number }}</span>
            </p>
            <p class="py-2">
                <span class="font-bold">Telefonszám: </span>
                <span>{{ vet.phone_number }}</span>
            </p>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    vet: Object,
})
</script>