<template>
    <form @submit.prevent="form.put(route('medicines.update', medicine))" class="mt-6 space-y-6">
        <div>
            <InputLabel for="name" value="Gyógyszer neve*" />

            <TextInput
                id="name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.name"
                required
                autofocus
            />

            <InputError class="mt-2" :message="form.errors.name" />
        </div>
        <div>
            <InputLabel for="description" value="Gyógyszer leírása" />

            <TextInput
                id="description"
                type="text"
                class="mt-1 block w-full"
                v-model="form.description"
            />

            <InputError class="mt-2" :message="form.errors.description" />
        </div>
        <div>
            <InputLabel for="active_substance" value="Hatóanyag" />

            <TextInput
                id="active_substance"
                type="text"
                class="mt-1 block w-full"
                v-model="form.active_substance"
            />

            <InputError class="mt-2" :message="form.errors.active_substance" />
        </div>
        <div>
            <InputLabel for="registration_number" value="Nyilvántartási szám" />

            <TextInput
                id="registration_number"
                type="text"
                class="mt-1 block w-full"
                v-model="form.registration_number"
            />

            <InputError class="mt-2" :message="form.errors.registration_number" />
        </div>
        <div class="flex items-center gap-4">
            <PrimaryButton :disabled="form.processing">Mentés</PrimaryButton>

            <Transition
                enter-active-class="transition ease-in-out"
                enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out"
                leave-to-class="opacity-0"
            >
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Sikeresen mentve.</p>
            </Transition>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const { medicine } = defineProps({
    medicine: Object,
});

const form = useForm({
    name: medicine.name,
    description: medicine.description,
    active_substance: medicine.active_substance,
    registration_number: medicine.registration_number,
});
</script>