<template>
    <AdminLayout>
        <p>Bem-vindo ao painel administrativo.</p>
        <p>Clientes {{ tenants_count }}</p>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from './Layouts/AdminLayout.vue';
defineProps({
    tenants_count: Number,
    user: Object,
})
</script>