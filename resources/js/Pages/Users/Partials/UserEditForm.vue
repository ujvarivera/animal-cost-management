<template>
    <form @submit.prevent="form.put(route('users.update', user))" class="mt-6 space-y-6">
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
        <div>
            <InputLabel for="email" value="E-mail*" />

            <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
            />

            <InputError class="mt-2" :message="form.errors.email" />
        </div>
        <div>
            <InputLabel for="role_id" value="Jogosultság*" />
            <select v-model="form.role_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                <option value=1>Felhasználó</option>
                <option value=2>Admin</option>
            </select>

            <InputError class="mt-2" :message="form.errors.role_id" />
        </div>
        <div>
            <InputLabel for="password" value="Jelszó*" />

            <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
            />

            <InputError class="mt-2" :message="form.errors.password" />
        </div>
        <div class="mt-3">
            <InputLabel for="password_confirmation" value="Jelszó megerősítése*" />
            <TextInput 
                id="password_confirmation" 
                type="password" 
                class="mt-1 block w-full" 
                v-model="form.password_confirmation" 
                required 
                autocomplete="new-password" />
            <InputError class="mt-2" :message="form.errors.password_confirmation" />
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

const { user } = defineProps({
    user: Object,
});

const form = useForm({
    name: user.name,
    email: user.email,
    password: null,
    password_confirmation: null,
    role_id: user.role_id
});
</script>