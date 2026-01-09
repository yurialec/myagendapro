<template>
    <nav class="navbar navbar-light bg-white shadow-sm" style="height: 60px;">
        <div class="container-fluid h-100 d-flex align-items-center">
            <button class="btn btn-outline-secondary me-3" type="button" @click="$emit('toggle-sidebar')"
                aria-label="Toggle sidebar">
                <i class="bi bi-list"></i>
            </button>
            <div class="flex-grow-1"></div>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                    data-bs-toggle="dropdown">
                    {{ $page.props.auth.user.name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form @submit.prevent="logout">
                            <button type="submit" class="dropdown-item">Sair</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { router } from '@inertiajs/vue3'

defineEmits(['toggle-sidebar'])

const logout = () => {
    router.post(route('logout'))
}
</script>