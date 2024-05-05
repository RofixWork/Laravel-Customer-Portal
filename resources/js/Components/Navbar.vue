<script setup>

import {router, usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const page = usePage();
const user = computed(() => page.props.auth.user);
function logout()
{
    router.post('/auth/logout');
}

</script>
<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Hello, {{ user.name }}</a>
                    </li>
                </ul>
                <button @click="logout" class="btn btn-primary">Logout</button>
            </div>
        </div>
    </nav>
</template>


<style scoped>

</style>
