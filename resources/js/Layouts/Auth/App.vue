<script setup>
    import { ref } from 'vue';
    import Header from '@/Layouts/Auth/Header.vue';
    import Sidebar from '@/Layouts/Auth/Sidebar.vue';

    const isSidebarOpen = ref(false);
</script>

<template>
    <div class="min-h-screen flex">
        <Header @open-sidebar="isSidebarOpen = true" />

        <Sidebar :open="isSidebarOpen" @close="isSidebarOpen = false" />

        <div class="flex-1 px-4 mt-20 lg:ml-64">
            <slot />
        </div>
    </div>
</template>
