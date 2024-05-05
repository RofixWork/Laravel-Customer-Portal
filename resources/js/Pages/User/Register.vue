<script setup>

import {Link, useForm, Head} from "@inertiajs/vue3";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
})

function submit()
{
    form.post('/auth/register', {
        onSuccess: () => {
            form.reset();
        }
    });
}

</script>
<template>
<div class="row justify-content-center pt-4">
    <Head>
        <title>Register</title>
    </Head>
    <div class="col-sm-12 col-md-7">
        <form @submit.prevent="submit">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" v-model="form.name" :class="{'is-invalid': form.errors.name}" class="form-control" id="name" aria-describedby="emailHelp">
                <div id="name" class="invalid-feedback">
                    {{ form.errors.name }}
                </div>

            </div>
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
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                <input type="password" v-model="form.password_confirmation" :class="{'is-invalid': form.errors.password_confirmation}" class="form-control" id="exampleInputPassword2">
                <div id="exampleInputPassword2" class="invalid-feedback">
                    {{ form.errors.password_confirmation }}
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <Link class="ms-1" href="/user/login">Login</Link>

        </form>
    </div>
</div>
</template>


<style scoped>

</style>
