<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: {
        type: Array,
        required: true,
    },
    form: {
        type: Object,
        required: false,
    },
});
</script>

<template>
    <ul class="pagination">
        <li v-for="link in links" :key="link.label" class="page-item">
            <Link
                class="page-link"
                :class="{ active: link?.active }"
                :href="link?.url ?? ''"
                :disabled="!link?.url"
                aria-label="Previous"
                method="post"
                :data="{
                    city: form.city,
                    name: form.name,
                    order: form.order,
                }"
                as="button"
            >
                <span aria-hidden="true" v-html="link?.label"></span>
            </Link>
        </li>
    </ul>
</template>

<style></style>
