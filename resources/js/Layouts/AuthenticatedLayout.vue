<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
        <Navigation />

        <div class="flex flex-1 flex-col overflow-hidden">
            <Header />

            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <h3 class="mb-4 text-3xl font-medium text-gray-700">
                        <slot name="header" />
                    </h3>

                    <flash-message v-if="$page.props.flash.success" :message="$page.props.flash.success" class="text-green-700 bg-green-100 border-green-300"/>
                    <flash-message v-if="$page.props.flash.warning" :message="$page.props.flash.warning" class="text-red-700 bg-red-100 border-red-300"/>

                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>
import Header from '@/Layouts/Header.vue';
import Navigation from '@/Layouts/Navigation.vue';
import FlashMessage from '@/Components/Custom/FlashMessage.vue';
import 'primevue/resources/themes/lara-light-teal/theme.css'
</script>
