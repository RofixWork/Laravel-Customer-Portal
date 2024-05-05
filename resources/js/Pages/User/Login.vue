<script setup>

import {useForm, Link, Head} from "@inertiajs/vue3";

defineProps({
    messageLoginError: {
        type: String
    }
})

const form = useForm({
    email: '',
    password: '',
    remember: false
})

function submit()
{
    form.post('/auth/login', {
        onSuccess: () => {
            form.reset();
        }
    });
}

</script>
<template>
    <div class="row justify-content-center pt-4">
        <Head>
            <title>Login</title>
        </Head>
        <div class="col-sm-12 col-md-7">
            <div v-if="messageLoginError" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error Message: </strong> {{ messageLoginError }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" v-model="form.email" :class="{'is-invalid': form.errors.email}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="exampleInputEmail1" class="invalid-feedback">
                        {{ form.errors.email }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" v-model="form.password" :class="{'is-invalid': form.errors.password}" class="form-control" id="exampleInputPassword1">
                    <div id="exampleInputEmail1" class="invalid-feedback">
                        {{ form.errors.password }}
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input v-model="form.remember" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
                <Link class="ms-1" href="/user/register">Register</Link>
            </form>
        </div>
    </div>
</template>


<style scoped>

</style>
