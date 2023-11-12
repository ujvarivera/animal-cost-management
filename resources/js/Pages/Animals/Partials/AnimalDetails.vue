<template>
    <div class="p-6 border-b border-gray-200">
        <div class="flex justify-center items-center my-4">
            <img v-if="animal.image !== null" :src="showImage() + animal.image" alt="Image about the animal" class="w-100 h-80 rounded-3xl">
        </div>

        <div class="text-xl flex flex-col justify-center items-center">
            <p class="py-2">
                <span class="font-bold">Név: </span>
                <span>{{ animal.name }}</span>
            </p>
            <p class="py-2">
                <span class="font-bold">Születésnap: </span>
                <span>{{ animal.birthday }}</span>
            </p>
            <p class="py-2">
                <span class="font-bold">Hímnemű: </span>
                <span>{{ animal.is_male == 1 ? 'Igen' : 'Nem' }}</span>
            </p>
            <p class="py-2">
                <span class="font-bold">Állatfaj: </span>
                <span>{{ animal.animal_type.name }}</span>
            </p>
        </div>

    </div>
</template>

<script setup>
import { showImage } from '@/utils/utils'

const props = defineProps({
    animal: Object
})
</script>