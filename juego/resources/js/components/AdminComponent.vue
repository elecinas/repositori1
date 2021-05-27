<template>
    <div id="admin-component">
        <!-- comentario vue-template -->
        <form-component />
        <game-component />
    </div>
</template>

<script>
//declaramos componentes hijos
import GameComponent from "./GameComponent";
import FormComponent from "./FormComponent";

/**info que trasladamos fuera del componente? 9_9  */
export default {
    name: "admin-component",
    components: {
        "game-component": GameComponent,
        "form-component": FormComponent,
    },
};
</script>

<style></style>
