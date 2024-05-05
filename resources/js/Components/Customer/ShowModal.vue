<script setup>
const props = defineProps({
    customer: {
        type: Object,
        required: true
    }
})
</script>
<template>
    <div class="modal fade " id="showCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Customer Details:</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        <li class="list-group-item">Name: {{customer?.firstName}} {{customer?.lastName}}</li>
                        <li class="list-group-item">Age: {{ customer?.age }} years old ago</li>
                        <li class="list-group-item">Job: {{ customer?.job }}</li>
                        <li class="list-group-item">City: {{ customer?.city }}</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
