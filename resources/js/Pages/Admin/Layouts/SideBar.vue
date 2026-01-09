<template>
    <aside class="bg-dark text-white position-fixed top-0 h-100 z-1030" :class="{
        'start-0': isMobile || !collapsed,
        'start-neg-260': isMobile && collapsed
    }" :style="{
        width: isMobile ? '260px' : (collapsed ? '60px' : '260px'),
        transition: 'all 0.25s ease',
        zIndex: 1030
    }">
        <div class="d-flex align-items-center px-3 border-bottom" style="height: 60px;">
            <span v-if="!collapsed || isMobile" class="fw-bold fs-5">MyAgendaPro</span>
            <span v-else class="fw-bold">M</span>
        </div>
        <div class="p-1">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <Link :href="route('admin.dashboard')" class="nav-link text-white d-flex align-items-center gap-2"
                        :class="{ 'bg-primary rounded': $page.url === '/admin/dashboard' }" @click="closeOnMobile">
                        <span><i class="bi bi-building"></i></span>
                        <span v-if="!collapsed || isMobile">Dashboard</span>
                    </Link>
                </li>
                <li class="nav-item mb-2">
                    <Link href="#" class="nav-link text-white d-flex align-items-center gap-2"
                        :class="{ 'bg-primary rounded': $page.url.startsWith('/admin/tenants') }"
                        @click="closeOnMobile">
                        <span><i class="bi bi-building"></i></span>
                        <span v-if="!collapsed || isMobile">Tenants</span>
                    </Link>
                </li>
            </ul>
        </div>
    </aside>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    collapsed: Boolean,
    isMobile: Boolean
});

const emit = defineEmits(['update:collapsed'])

const closeOnMobile = () => {
    if (props.isMobile) {
        emit('update:collapsed', true)
    }
}
</script>

<style scoped>
.start-neg-260 {
    transform: translateX(-260px);
}

.nav-link {
    border-radius: 0.375rem !important;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.z-1030 {
    z-index: 1030;
}
</style>