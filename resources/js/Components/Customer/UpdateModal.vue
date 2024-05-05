<script setup>
import { useForm } from "@inertiajs/vue3";
import {onMounted, onUnmounted, ref, watch, watchEffect} from "vue";

const props = defineProps({
    customer: {
        type: Object,
        required: true
    }
})

//access DOM item
const btnModalClose = ref(null);

const form = useForm({
    firstName: "",
    lastName: "",
    age: "",
    job: "",
});

watch(() => props.customer, (currentCustomer) => {
    form.firstName = currentCustomer.firstName;
    form.lastName = currentCustomer.lastName;
    form.age = currentCustomer.age;
    form.job = currentCustomer.job;
});

function submit()
{
    form.patch(`/customers/update/${props.customer?.id}`, {
        onSuccess: () => {
            form.reset();
            const element = btnModalClose.value;
            element?.click();
        },
    });
}


</script>

<template>
    <div
        class="modal fade"
        id="updateCustomerModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <form @submit.prevent="submit" method="post" class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Update a Customer
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="firstName" class="form-label"
                        >First Name</label
                        >
                        <input
                            v-model="form.firstName"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.firstName }"
                            id="firstName"
                        />
                        <div class="invalid-feedback">
                            {{ form.errors.firstName }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label"
                        >Last Name</label
                        >
                        <input
                            v-model="form.lastName"
                            type="text"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.lastName }"
                            id="lastName"
                        />
                        <div class="invalid-feedback">
                            {{ form.errors.lastName }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input
                            v-model="form.age"
                            type="number"
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.age }"
                            id="age"
                        />
                        <div class="invalid-feedback">
                            {{ form.errors.age }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="job" class="form-label">Job</label>
                        <input
                            v-model="form.job"
                            type="text"
                            :class="{ 'is-invalid': form.errors.job }"
                            class="form-control"
                            id="job"
                        />
                        <div class="invalid-feedback">
                            {{ form.errors.job }}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                        id='closeCustomerCreateModal'
                        ref='btnModalClose'
                    >
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style></style>
