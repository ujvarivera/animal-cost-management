<template>
    <Head title="Új állat hozzáadása" />

    <AuthenticatedLayout>
        <template #header>
            Új állat hozzáadása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

            <form @submit.prevent="form.post(route('animals.store'))" class="mt-6 space-y-6">
                <div>
                    <InputLabel for="name" value="Név" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>
                    <InputLabel for="is_male" value="Hímnemű" />

                    <select v-model="form.is_male" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                        <option value="1">Igen</option>
                        <option value="0">Nem</option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.is_male" />
                </div>
                <div>
                    <InputLabel for="birthday" value="Születésnap" />

                    <TextInput
                        id="birthday"
                        type="date"
                        class="mt-1 block w-full"
                        v-model="form.birthday"
                    />

                    <InputError class="mt-2" :message="form.errors.birthday" />
                </div>
                <div>
                    <InputLabel for="animal_type_id" value="Állatfaj" />
                    <select v-model="form.animal_type_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                        <option v-for="animalType in animalTypes" :value="animalType.id">
                            {{ animalType.name }}
                        </option>
                    </select>

                    <InputError class="mt-2" :message="form.errors.animal_type_id" />
                </div>

                <div>
                    <InputLabel for="image" value="Képfeltöltés" />

                    <input type="file" @input="form.image = $event.target.files[0]" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                    
                    <InputError class="mt-2" :message="form.errors.image" />

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

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    animalTypes: Array
})

const form = useForm({
    name: null,
    is_male: 1,
    birthday: null,
    image: null,
    animal_type_id: 1
});
</script>