<template>
    <form @submit.prevent="form.post(route('animaltypes.store'))" class="mt-6 space-y-6">
        <div>
            <InputLabel for="name" value="Név*" />

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

const form = useForm({
    name: null,
});
</script>
