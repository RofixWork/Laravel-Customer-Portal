<script setup xmlns="" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation=" ">
import Filter from "../../Components/Filter.vue";
import {Link, useForm, Head, router} from "@inertiajs/vue3";
import Paginate from "../../Components/Paginate.vue";
import CreateModal from "../../Components/Customer/CreateModal.vue";
import UpdateModal from "../../Components/Customer/UpdateModal.vue";
import {ref} from 'vue';
import ShowModal from "../../Components/Customer/ShowModal.vue";
import AppLayout from "../../Layouts/AppLayout.vue";

defineProps({
    customers: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: "",
    city: "",
    order: "",
});

const customer = ref({
    id: '',
    firstName: '',
    lastName: '',
    age: '',
    job: '',
})

function submit() {
    form.post("/customers");
}

function getCustomer(currentCustomer) {
    customer.value = {
        id: currentCustomer.id,
        firstName: currentCustomer.firstName,
        lastName: currentCustomer.lastName,
        age: currentCustomer.age,
        job: currentCustomer.job,
        city: currentCustomer.city
    };
}

function deleteCustomers(id) {

    if (confirm("Are you sure ou want remove this customer: ")) {
        router.delete(`/customers/delete/${id}`);
    }
}

function updateCustomer(currentCustomer) {
    customer.value = {
        id: currentCustomer.id,
        firstName: currentCustomer.firstName,
        lastName: currentCustomer.lastName,
        age: currentCustomer.age,
        job: currentCustomer.job,
    };
}


</script>

<template>
    <AppLayout>
    <!-- <pre>
        {{ customers }}
    </pre> -->
    <Head>
        <title>Customers</title>
    </Head>
<!--    show customer details-->
    <ShowModal :customer="customer" />
    <!-- create customer modal -->
    <CreateModal />
<!--    update customer modal form-->
    <UpdateModal :customer="customer" />
    <div>
        <div class="container-fluid">
            <div class="row gap-x-3">
                <div class="col-md-3">
                    <Filter @submit="submit" :form="form" />
                </div>
                <div class="col-md-9">
                    <div
                        class="d-flex justify-content-between py-3 align-items-center"
                    >
                        <h3>Customers</h3>
                        <button
                            class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#createCustomerModal"
                        >
                            Add
                        </button>
                    </div>
                    <hr />
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Age</th>
                                <th scope="col">Job</th>
                                <th scope="col">City</th>
                                <th scope="col">Country</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody v-if="customers?.data.length">
                            <tr
                                scope="row"
                                v-for="customer in customers?.data"
                                :key="customer.id"
                            >
                                <td>{{ customer.id }}</td>
                                <td>
                                    {{ customer.firstName }}
                                    {{ customer.lastName }}
                                </td>
                                <td>{{ customer.age }}</td>
                                <td>{{ customer.job }}</td>
                                <td>{{ customer.city }}</td>
                                <td>{{ customer.country }}</td>
                                <td>
                                    <button
                                        data-bs-toggle="modal"
                                        data-bs-target="#showCustomerModal"
                                        class="btn btn-primary"
                                        @click="() => getCustomer(customer)"
                                    >Show</button
                                    >
                                    <button
                                        @click="() => updateCustomer(customer)"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateCustomerModal"
                                        class="ms-1 btn btn-secondary"
                                        >Edit</button
                                    >
                                    <button
                                        @click="() => deleteCustomers(customer.id)"
                                        class="ms-1 btn btn-danger"
                                        >Delete</button
                                    >
                                </td>
                            </tr>
                        </tbody>
                        <td colspan="6">No Items</td>
                    </table>

                    <!-- paginate -->
                    <nav aria-label="Page navigation example">
                        <Paginate :links="customers?.links" :form="form" />
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </AppLayout>
</template>

<style></style>
