<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl">Admin Dashboard</h2>
        </template>

        <div class="p-6">
            <p>Total de tenants: {{ tenants_count }}</p>
            <p>Bem-vindo, {{ user.name }}!</p>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
defineProps({
    tenants_count: Number,
    user: Object,
})
</script>