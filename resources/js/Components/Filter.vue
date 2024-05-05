<script setup>
const emit = defineEmits(['submit']);

defineProps({
    form: {type: Object}
});
</script>

<template>

    <div>
        <form @submit.prevent="() => emit('submit')" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"
                    >Name</label
                >
                <input
                    type="search"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder="search by name..."
                    v-model="form.name"
                />
            </div>
            <div class="mb-3">
                <label for="city">Filter By City</label>
                <select
                    v-model="form.city"
                    id="city"
                    class="form-select"
                    aria-label="Default select example"
                >
                    <option value="">All</option>
                    <option value="agadir">Agadir</option>
                    <option value="fes">Fes</option>
                    <option value="tanger">Tanger</option>
                    <option value="casablanca">Casablanca</option>
                    <option value="taroudant">Taroundat</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="city">OrderBy Age:</label>
                <select
                    v-model="form.order"
                    id="city"
                    class="form-select"
                    aria-label="Default select example"
                >
                    <option selected value="">choose_order_type</option>
                    <option value="asc">ASC</option>
                    <option value="desc">DESC</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
    </div>
</template>

<style></style>
