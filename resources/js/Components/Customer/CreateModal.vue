<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

//access DOM item
const btnModalClose = ref(null);

const form = useForm({
    firstName: "",
    lastName: "",
    age: "",
    job: "",
    city: "",
});

function submit() {
    form.post("/customers/create", {
        onSuccess: () => {
            form.reset();
            const element = btnModalClose.value;
            element.click();
        }
    });
}
</script>

<template>
    <div
        class="modal fade"
        id="createCustomerModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <form @submit.prevent="submit" method="post" class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Create a new Customer
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
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <select
                            class="form-select"
                            :class="{ 'is-invalid': form.errors.city }"
                            id="city"
                            aria-label="Default select example"
                            v-model="form.city"
                        >
                            <option value="" hidden>
                                Open this select menu
                            </option>
                            <option value="agadir">Agadir</option>
                            <option value="casablanca">Casablanca</option>
                            <option value="marrakech">Marrakech</option>
                            <option value="rabat">Rabat</option>
                            <option value="fez">Fez</option>
                            <option value="tangier">Tangier</option>
                            <option value="essaouira">Essaouira</option>
                            <option value="fes">Fes</option>
                            <option value="meknes">Meknes</option>
                            <option value="oujda">Oujda</option>
                            <option value="kenitra">Kenitra</option>
                            <option value="tétouan">Tétouan</option>
                            <option value="agadir">Agadir</option>
                            <option value="dakhla">Dakhla</option>
                            <option value="errachidia">Errachidia</option>
                            <option value="ouarzazate">Ouarzazate</option>
                            <option value="tafraout">Tafraout</option>
                            <option value="chefchaouen">Chefchaouen</option>
                            <option value="taroudant">Taroudant</option>
                            <option value="meknes">Meknes</option>
                            <option value="nador">Nador</option>
                            <option value="larache">Larache</option>
                            <option value="asfi">Asfi</option>
                            <option value="tetouan">Tetouan</option>
                            <option value="taza">Taza</option>
                            <option value="safi">Safi</option>
                            <option value="berkane">Berkane</option>
                            <option value="sidi kacem">Sidi Kacem</option>
                            <option value="khémisset">Khémisset</option>
                            <option value="beni mellal">Beni Mellal</option>
                            <option value="taourirt">Taourirt</option>
                            <option value="fqui">Fqui</option>
                            <option value="martil">Martil</option>
                            <option value="guercif">Guercif</option>
                            <option value="ouezzane">Ouezzane</option>
                            <option value="zak">Zak</option>
                            <option value="aroui">Aroui</option>
                            <option value="sidi slimane">Sidi Slimane</option>
                            <option value="midelt">Midelt</option>
                            <option value="taounate">Taounate</option>
                            <option value="ksar el kebir">Ksar el Kebir</option>
                            <option value="bouznika">Bouznika</option>
                            <option value="azrou">Azrou</option>
                            <option value="taaounate">Taaounate</option>
                            <option value="sidi yahya el gharb">
                                Sidi Yahya El Gharb
                            </option>
                            <option value="sefrou">Sefrou</option>
                            <option value="tiznit">Tiznit</option>
                            <option value="assilah">Assilah</option>
                            <option value="sidi ifni">Sidi Ifni</option>
                            <option value="tafraoute">Tafraoute</option>
                            <option value="meknes">Meknes</option>
                            <option value="larache">Larache</option>
                            <option value="asfi">Asfi</option>
                            <option value="taounate">Taounate</option>
                            <option value="safi">Safi</option>
                            <option value="taza">Taza</option>
                            <option value="boujdour">Boujdour</option>
                            <option value="ouazzane">Ouazzane</option>
                            <option value="boulemane">Boulemane</option>
                            <option value="sidi slimane">Sidi Slimane</option>
                            <option value="bouarfa">Bouarfa</option>
                            <option value="ahfir">Ahfir</option>
                            <option value="ouarzazat">Ouarzazat</option>
                            <option value="oujda">Oujda</option>
                            <option value="zouérat">Zouérat</option>
                            <option value="figuig">Figuig</option>
                            <option value="smara">Smara</option>
                            <option value="assouan">Assouan</option>
                            <option value="monastir">Monastir</option>
                            <option value="tunis">Tunis</option>
                            <option value="sfax">Sfax</option>
                            <option value="sousse">Sousse</option>
                            <option value="kairouan">Kairouan</option>
                            <option value="gabès">Gabès</option>
                            <option value="bizerte">Bizerte</option>
                            <option value="ariana">Ariana</option>
                            <option value="gafsa">Gafsa</option>
                            <option value="kasserine">Kasserine</option>
                            <option value="nabeul">Nabeul</option>
                            <option value="tozeur">Tozeur</option>
                            <option value="ben arous">Ben Arous</option>
                            <option value="mahdia">Mahdia</option>
                            <option value="medenine">Medenine</option>
                            <option value="zaghouan">Zaghouan</option>
                            <option value="siliana">Siliana</option>
                            <option value="kebili">Kebili</option>
                            <option value="beja">Beja</option>
                            <option value="jendouba">Jendouba</option>
                            <option value="tataouine">Tataouine</option>
                            <option value="kef">Kef</option>
                            <option value="sidi bouzid">Sidi Bouzid</option>
                        </select>
                        <div class="invalid-feedback">
                            {{ form.errors.city }}
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
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style></style>
