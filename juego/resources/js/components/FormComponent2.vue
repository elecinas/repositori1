<template>
    <!-- STARTS Register -->
    <div class="col-6">
        <h4>Nuevo usuario</h4>
        <form method="POST" action="" v-on:submit.prevent="registerPlayer()">
            <div class="form-group mt-2">
                <label for="name">Nombre</label>
                <input
                    name="name"
                    type="text"
                    class="form-control"
                    v-model="name"
                />
            </div>
            <div class="form-group mt-2">
                <label for="email">Correo electrónico</label>
                <input
                    name="email"
                    type="email"
                    class="form-control"
                    v-model="email"
                />
            </div>
            <div class="form-group mt-2">
                <label for="password">Contraseña</label>
                <input
                    name="password"
                    type="text"
                    class="form-control"
                    v-model="password"
                />
            </div>
            <button type="submit" class="btn btn-dark mt-4">Submit</button>
        </form>
    </div>
    <!-- ENDS Register -->
</template>

<script>
export default {
    name: "form-component2",

    data() {
        return {
            name: "",
            email: "",
            password: "",
        };
    },

    methods: {
        registerPlayer() {
            let user = {
                id: 1,
                name: this.name,
                email: this.email,
                password: this.password,
            };
            this.$emit("new", user);
        },
    },
};
</script>

<style scoped>
.row {
    margin-bottom: 2em;
}
</style>
