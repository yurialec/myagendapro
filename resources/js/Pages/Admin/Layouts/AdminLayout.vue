<template>
    <div class="d-flex flex-column min-vh-100">
        <NavBar @toggle-sidebar="isSidebarOpen = !isSidebarOpen" />
        <div v-if="isMobile && isSidebarOpen" class="position-fixed top-0 start-0 w-100 h-100 bg-black opacity-50"
            style="z-index: 1029;" @click="isSidebarOpen = false"></div>
        <SideBar :collapsed="!isSidebarOpen" :is-mobile="isMobile" />
        <div class="flex-grow-1 overflow-auto">
            <main :style="{
                marginLeft: !isMobile ? (isSidebarOpen ? '260px' : '60px') : '0',
                transition: 'margin-left 0.25s ease',
            }"
            class="mt-2">
                <slot />
            </main>
        </div>
        <Footer />
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onBeforeUnmount, watch } from 'vue'
import SideBar from './SideBar.vue';
import NavBar from './NavBar.vue';
import Footer from './Footer.vue';

const windowWidth = ref(window.innerWidth)
const isSidebarOpen = ref(true)

const isMobile = computed(() => windowWidth.value < 768)

watch(isMobile, (newIsMobile) => {
    if (!newIsMobile) {
        isSidebarOpen.value = true
    }
})

onMounted(() => {
    const handleResize = () => {
        windowWidth.value = window.innerWidth
    }
    window.addEventListener('resize', handleResize)
    onBeforeUnmount(() => window.removeEventListener('resize', handleResize))
})
</script>