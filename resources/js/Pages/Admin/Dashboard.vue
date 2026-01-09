<template>
    <AdminLayout>
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col">
                    <h4 class="fw-bold">Dashboard</h4>
                    <small class="text-muted">
                        Visão geral do sistema
                    </small>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <small class="text-muted">Clientes</small>
                            <h3 class="fw-bold">{{ tenants_count }}</h3>
                        </div>
                    </div>
                </div>

                <!-- futuros cards -->
            </div>
        </div>
    </AdminLayout>
</template>


<script setup>
import AdminLayout from './Layouts/AdminLayout.vue';
defineProps({
    tenants_count: Number,
    user: Object,
})
</script>