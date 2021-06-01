<template>
    <!-- STARTS Login -->
    <div class="col-6">
        <h4>Usuario registrado</h4>
        <form method="POST" action="" v-on:submit.prevent="loginPlayer()">
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
    <!-- ENDS Login -->
</template>

<script>
export default {
    name: "form-component",

    data() {
        return {
            email: "",
            password: ""
        };
    },

    methods: {
        loginPlayer() {
            const params = {
                email: this.email,
                password: this.password,
            };

            axios.post("api/login", params).then((response) => {
                const user = response.data;
                this.$emit("new", user);
            });
        },
    },
};
</script>

<style scoped>
.row {
    margin-bottom: 2em;
}
</style>
