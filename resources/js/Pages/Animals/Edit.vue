<template>
    <Head title="Állat módosítása" />

    <AuthenticatedLayout>
        <template #header>
            {{ props.animal.name }} adatainak módosítása
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">

            <form @submit.prevent="submitForm" class="mt-6 space-y-6">
                <div v-if="form.image !== null && imageShown" class="flex justify-center items-center my-4">
                    <img :src="showImage() + form.image" alt="Image about the animal" class="w-100 h-80 rounded-3xl">
                </div>
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
                        autofocus
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
                    <InputLabel for="image" value="Kép lecserélése" />
                        <input type="file" @input="uploadFileImage($event.target.files[0])" />
                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>
                    <InputError class="mt-2" :message="form.errors.image" />
                </div>

                <div class="flex items-center gap-4">
                    <PrimaryButton :disabled="form.processing">Mentés</PrimaryButton>
                </div>
            </form>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage} from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { showImage } from '@/utils/utils'
import { ref } from 'vue';

const props = defineProps({
    animal: Object,
    animalTypes: Array
})

// const animal = usePage().props.animal;

const form = useForm({
    _method: 'put',
    id: props.animal.id,
    name: props.animal.name,
    is_male: props.animal.is_male,
    birthday: props.animal.birthday,
    image: props.animal.image,
    animal_type_id: props.animal.animal_type_id
});

//const form = useForm(props.animal);

const imageShown = ref(true);

function uploadFileImage(file) {
    form.image = file;
    imageShown.value = false;
}

function submitForm() {
    form.post(route('animals.update', form.id))
}

</script>