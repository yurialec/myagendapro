<template>
    <div class="admin-layout d-flex flex-column min-vh-100">
        <NavBar @toggle-sidebar="toggleSidebar" />

        <div v-if="isMobile && sidebarOpen" class="sidebar-overlay" @click="sidebarOpen = false" />

        <SideBar :collapsed="!sidebarOpen" :is-mobile="isMobile" />

        <!-- CONTEÚDO -->
        <main class="main-content flex-grow-1" :class="{ 'sidebar-collapsed': !sidebarOpen && !isMobile }">
            <slot />
        </main>

        <!-- FOOTER -->
        <Footer />
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import NavBar from './NavBar.vue'
import SideBar from './SideBar.vue'
import Footer from './Footer.vue'

const sidebarOpen = ref(true)
const width = ref(window.innerWidth)

const isMobile = computed(() => width.value < 768)

const toggleSidebar = () => {
    sidebarOpen.value = !sidebarOpen.value
}

const resize = () => (width.value = window.innerWidth)

onMounted(() => window.addEventListener('resize', resize))
onUnmounted(() => window.removeEventListener('resize', resize))
</script>

<style scoped>
.admin-layout {
    min-height: 100vh;
}

.main-content {
    margin-left: 260px;
    padding: 1.5rem;
    transition: margin-left 0.25s ease;
    padding-top: 76px;

}

.sidebar-collapsed {
    margin-left: 60px;
}

@media (max-width: 767px) {
    .main-content {
        margin-left: 0;
    }
}

.sidebar-collapsed {
    margin-left: 60px;
}

@media (max-width: 767px) {
    .main-content {
        margin-left: 0;
    }
}

.sidebar-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1029;
}
</style>
