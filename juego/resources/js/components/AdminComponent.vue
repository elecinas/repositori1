<template>
    <div id="admin-component">
        <form-component />
        <game-component />
    </div>
</template>

<script>
import GameComponent from "./GameComponent";
import FormComponent from "./FormComponent";
export default {
    name: "admin-component",
    components: {
        "game-component": GameComponent,
        "form-component": FormComponent,
    },
};
</script>

<style></style>
