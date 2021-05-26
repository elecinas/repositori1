<template>
    <div id="form-component" class="row">
        <!-- STARTS Login -->
        <div class="col-6">
            <h4>Usuario registrado</h4>
            <form method="POST" action="">
                <div class="form-group mt-2">
                    <label for="email">Correo electrónico</label>
                    <input
                        name="email"
                        type="email"
                        class="form-control"
                        id="email"
                        value=""
                        placeholder="example@mail.com"
                    />
                </div>
                <div class="form-group mt-2">
                    <label for="password">Contraseña</label>
                    <input
                        name="password"
                        type="text"
                        class="form-control"
                        id="password"
                        value=""
                        placeholder="password"
                    />
                </div>
                <button type="submit" class="btn btn-dark mt-4">Submit</button>
            </form>
        </div>
        <!-- ENDS Login -->
        <!-- STARTS Register -->
        <div class="col-6">
            <h4>Nuevo usuario</h4>
            <form method="POST" action="">
                <div class="form-group mt-2">
                    <label for="name">Nombre</label>
                    <input
                        name="name"
                        type="text"
                        class="form-control"
                        id="name"
                        value=""
                        placeholder="name"
                    />
                </div>
                <div class="form-group mt-2">
                    <label for="email">Correo electrónico</label>
                    <input
                        name="email"
                        type="email"
                        class="form-control"
                        id="email"
                        value=""
                        placeholder="example@email.com"
                    />
                </div>
                <div class="form-group mt-2">
                    <label for="password">Contraseña</label>
                    <input
                        name="password"
                        type="text"
                        class="form-control"
                        id="password"
                        value=""
                        placeholder="password"
                    />
                </div>
                <button type="submit" class="btn btn-dark mt-4">Submit</button>
            </form>
        </div>
        <!-- ENDS Register -->
    </div>
</template>

<script>
export default {
    name: "form-component",
};
</script>

<style></style>
